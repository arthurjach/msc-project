<?php

require('extract-functions.php');

function getRanking($query, $domain) {
    $link = array();
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
            $links_line = preg_split('/\<h3 class=\"r\"><a href=\"/', $content, -1, PREG_SPLIT_NO_EMPTY);
            $link_tag = array_slice(getLink($links_line), 1);
            $link = getLinkURL($link_tag);
        }
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
}
?>
   