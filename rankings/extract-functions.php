<?php

/**
 * The analysis of organic search click-through rates (CTR) 
 * from different Google search result positionsGAPI - Google Analytics PHP Interface
 * 
 * https://github.com/arthurjach/msc-project
 * 
 * @copyright Artur Jach 2012
 * @author Artur Jach <arthurjach@yahoo.co.uk>
 * @version 1.0
 * 
 */

function cleanseSearchQuery($in) {
    $out = str_replace(" ", "+", $in);
    return $out;
}

function getLink($in) {
    $counterlink = 1;
    $readylinks = array();
    foreach ($in as $val) {
        if (preg_match("/(.*)\"/", $val, $lin)) {
            $onelink[$counterlink] = $lin[1];
            $readylinks[$counterlink] = strip_tags($onelink[$counterlink]);
            $counterlink++;
        }
    }
    return $readylinks;
}

function getLink2($in) {
    $counterlink = 1;
    $readylinks = array();
    foreach ($in as $val) {
        if (preg_match("/(.*)<\/cite><\/li>/", $val, $lin)) {
            $onelink[$counterlink] = $lin[1];
            $readylinks[$counterlink] = strip_tags($onelink[$counterlink]);
            $counterlink++;
        }
    }
    return $readylinks;
}

function getLinkURL($in) {
    $counterlink = 0;
    $readylinkurl = array();
    foreach ($in as $val) {
        $eplode_temp = explode("\"", $val);
        $readylinkurl[$counterlink] = $eplode_temp[0];
        $counterlink++;
    }
    return $readylinkurl;
}
?>


