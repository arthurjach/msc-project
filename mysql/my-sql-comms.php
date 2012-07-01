<?php

//DB access config
$host = 'localhost';
$user = 'root';
$pass = 'skarb1';
$schema = 'mscproject';

//Connect to the MySQL DB
$link = mysqli_connect($host, $user, $pass, $schema);
if (mysqli_connect_errno()) {
    exit(mysqli_connect_connect_error());
}

//Create DB table for storing keywords, keyword visits and rankings, and date when extracted
function createKeywordVisitsRankingsMySQLTable($ga_profile_id) {
    global $link;
    $sql = "CREATE TABLE IF NOT EXISTS keyword_visits_rankings_$ga_profile_id (
            keyword VARCHAR(50) NOT NULL,
            is_brand TINYINT(1) NOT NULL,
            date DATE NOT NULL,
            visits INT NOT NULL,
            ranking INT NOT NULL,
            number_of_sitelinks INT NOT NULL,
            number_of_ppc_ads INT NOT NULL,
            is_own_ppc_ad INT NOT NULL,
            click_through_rate FLOAT,
            primary key (keyword,date)
            );";

    mysqli_query($link, $sql);
}

//Add new records to the keyword_visits_rankings table
function insertIntoKeywordVisitsRankingsMySQLTable($keyword, $is_brand, $date, $visits, $ranking, $num_of_sitelinks, $num_of_ppc_ads, $own_ppc_ad_found, $ga_profile_id) {
    global $link;
    $sql = "INSERT INTO keyword_visits_rankings_$ga_profile_id (keyword, is_brand, date,visits,ranking, number_of_sitelinks, number_of_ppc_ads, is_own_ppc_ad, click_through_rate) VALUES ('$keyword', '$is_brand', $date, '$visits', '$ranking', '$num_of_sitelinks', '$num_of_ppc_ads', '$own_ppc_ad_found',null);";
    mysqli_query($link, $sql);
}

//Create DB table for storing keywords and their exact match monthly search volumes
function createKeywordVolumesMySQLTable($ga_profile_id) {
    global $link;
    $sql = "CREATE TABLE IF NOT EXISTS keyword_volumes_$ga_profile_id (
            keyword VARCHAR(50) NOT NULL,
            search_volume INT NOT NULL,
            primary key (keyword)
            );";

    mysqli_query($link, $sql);
}

function checkIfKeywordMissingInKeywordVolumesMySQLTable ($ga_profile_id) {
    global $link;
    $sql = "SELECT DISTINCT keyword
            FROM keyword_visits_rankings_$ga_profile_id kvr
            WHERE NOT EXISTS (
                SELECT keyword
                FROM keyword_volumes_$ga_profile_id kv 
                WHERE kv.keyword = kvr.keyword
            );";
    $result = mysqli_query($link, $sql);
    return $result;
}

//Update the click_through_rate value where it's missing (is null)
function updateClickThroughRates($ga_profile_id) {
    global $link;
    $sql = "UPDATE keyword_visits_rankings_$ga_profile_id,keyword_volumes_$ga_profile_id 
            SET keyword_visits_rankings_$ga_profile_id.click_through_rate = 
                (keyword_visits_rankings_$ga_profile_id.visits/(keyword_volumes_$ga_profile_id.search_volume/30.41))*100 
            WHERE keyword_visits_rankings_$ga_profile_id.keyword = keyword_volumes_$ga_profile_id.keyword 
                AND keyword_volumes_$ga_profile_id.search_volume IS NOT NULL
                AND keyword_visits_rankings_$ga_profile_id.click_through_rate IS NULL;";
    mysqli_query($link, $sql);
}

?>
