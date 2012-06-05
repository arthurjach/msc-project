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

$sql = "SELECT DISTINCT keyword
            FROM keyword_visits_rankings kvr
            WHERE NOT EXISTS (
                SELECT keyword
                FROM keyword_volumes kv 
                WHERE kv.keyword = kvr.keyword
            );";
$result = mysqli_query($link, $sql);
$counter = '0';
$missing_keywords = array();
while ($row = mysqli_fetch_assoc($result)) {
    $missing_keywords["$counter"] = $row['keyword'];
    $counter++;
}
foreach ($missing_keywords as $value) {
    echo $value."<br />";
}

/*$sql2 = "SELECT DISTINCT keyword FROM keyword_visits_rankings";
$result2 = mysqli_query($link, $sql2);
$counter = '0';
$var = array();
while ($row = mysqli_fetch_assoc($result2)) {
    $var["$counter"] = $row['keyword'];
    $counter++;
}
foreach ($var as $value) {
    echo $value."<br />";
}*/

//echo mysql_result($result, 2);
?>
