<?php

require('/rankings/extract-functions.php');

$q = '';

function getRanking($query, $domain) {
    global $q;
    $q = $query;
    $ranking_position = 0;
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

$content = getRanking('sunlife direct', 'www.sunlifedirect.co.uk');

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

echo "PPC ad destination URLs for the query $q:";
foreach ($urls_of_ppc_ads as $value) {
    echo "<br />$value";
}

?>
