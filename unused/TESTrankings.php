<?php

require('/rankings/extract-functions.php');

$q = '';
$d = 'www.sunlifedirect.co.uk';

function getSearchResultContent($query, $domain) {
    global $q;
    $q = $query;
    if (isset($query) && isset($domain)) {
        $query = cleanseSearchQuery($query);
        $url = "http://www.google.co.uk/search?q=$query&num=20&hl=en";
        if ($handle = @fopen($url, "r")) {
            $content = "";
            while (!feof($handle)) {
                $part = fread($handle, 1024);
                $content .= $part;
                if (preg_match("</body>", $part))
                    break;
            }

            fclose($handle);
        }
    }
    return $content;
}

function getRanking($content, $domain) {
    $link = array();
    $ranking_position = 0;
    $links_line = preg_split('/\<h3 class=\"r\"><a href=\"/', $content, -1, PREG_SPLIT_NO_EMPTY);
    $link_tag = array_slice(getLink($links_line), 1);
    $link = getLinkURL($link_tag);

    $counter = 1;
    foreach ($link as $value) {
        if (strpos($value, $domain)) {
            $ranking_position = $counter;
            break;
        } else
            $counter++;
    }
    return $ranking_position;
}

function getSitelinks($content) {
    $link = array();
    $links_line = preg_split('/\<a class=\"sla\" href=\"/', $content, -1, PREG_SPLIT_NO_EMPTY);
//print_r($links_line);
    $link_tag = array_slice(getLink($links_line), 1);
    $link = getLinkURL($link_tag);
    return $link;
}

function getPaidSearchAds($content) {
    $link = array();
    $links_line = preg_split('/\<cite>/', $content, -1, PREG_SPLIT_NO_EMPTY);
    $link_tag = array_slice($links_line, 1);
    $link = getLink2($link_tag);
    return $link;
}

function cleanseSitelinkURLs($numsitelinks) {
    $temp_sitelinks = array();
    $sitelinks = array();
    foreach ($numsitelinks as $value) {
        $temp_sitelink_urls_1 = str_replace("/url?q=", "", $value);
        array_push($temp_sitelinks, $temp_sitelink_urls_1);
    }
    foreach ($temp_sitelinks as $value) {
        $temp_sitelink_urls_2 = explode('&', $value);
        array_push($sitelinks, $temp_sitelink_urls_2[0]);
    }
    return $sitelinks;
}

function checkForOwnPpcAd($urls_of_ppc_ads, $d) {
    $url_found = 0;
    foreach ($urls_of_ppc_ads as $value) {
        echo $value;
        echo $d;
        if (strstr($value, $d)) {
            $url_found = 1;
        }
    }
    return $url_found;
}

$content = getSearchResultContent('sunlife direct', $d);

echo "<h4># ranking position for the query '$q' : " . getRanking($content, $d) . "</h4>";

$number_of_sitelinks = getSitelinks($content);
echo "<h4># of sitelinks for the query '$q' : " . count($number_of_sitelinks) . "</h4>";

echo "Sitelink destination URLs for the query $q:";
$urls_of_sitelinks = cleanseSitelinkURLs($number_of_sitelinks);
foreach ($urls_of_sitelinks as $value) {
    echo "<br />$value";
}

echo "<hr />";
$urls_of_ppc_ads = getPaidSearchAds($content);
echo "<h4># of PPC adc for query $q: " . count($urls_of_ppc_ads) . "</h4>";
echo "<h4>Own PPC ad found: " . checkForOwnPpcAd($urls_of_ppc_ads, $d) . "</h4>";

echo "PPC ad destination URLs for the query $q:";
foreach ($urls_of_ppc_ads as $value) {
    echo "<br />$value";
}
?>
