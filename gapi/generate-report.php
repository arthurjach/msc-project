<?php
session_start();

$ga_email = $_SESSION['email'];
$ga_password = $_SESSION['password'];
$ga_profile_id = $_SESSION['profileid'];

$start_date = $_GET["startdate"];
$end_date = $_GET["enddate"];
$sort_metric = $_GET["sort"];
$ga_site_domain = $_GET["domaintocheck"];
$maxresult = $_GET["maxresult"];
$start_index = 1;

//how many seconds to wait before quering the next keyword in Google
$ranking_check_delay = 30;

$is_brand = 1;

require 'gapi.class.php';
require 'gapi-query-filters-factory.php';
require('../rankings/get-rankings.php');
require('../mysql/my-sql-comms.php');

$ga = new gapi($ga_email, $ga_password);
$filter = getQueryFilterBrandKeyword($ga_profile_id);
$is_brand = 1;
$ga->requestReportData($ga_profile_id, array('keyword'), array('visits'), $sort_metric, $filter, $start_date = $_GET["startdate"], $end_date = $_GET["enddate"], $start_index, $maxresult);
?>
<p>Data from <?php echo $_GET["startdate"] ?> to <?php echo $_GET["enddate"] ?>.</p>
<table>
    <tr>
        <th><a href="#" onclick="loadXMLDoc3('keyword')">Keyword</a></th>
        <th><a href="#" onclick="loadXMLDoc3('-visits')">Visits</a></th>
        <th><a href="#" >Ranking</a></th>
    </tr>
    <?php
    //create MySQL table for storing daily keywords, visits and ranking results
    createKeywordVisitsRankingsMySQLTable($ga_profile_id);

    //create MySQL table for storing keywords and their search volumes
    createKeywordVolumesMySQLTable($ga_profile_id);

    //print results
    foreach ($ga->getResults() as $result):
        ?>
        <tr>
            <td>
                <?php
                //store in DB
                echo $result;
                ?>
            </td>
            <td>
                <?php
                //store in DB
                $visits = $result->getVisits();
                echo $visits;
                ?>
            </td>
            <td>
                <?php
                $search_results = getSearchResultContent($result, $ga_site_domain);
                $ranking = getRanking($search_results, $ga_site_domain);
                echo $ranking;
                $sitelinks = count(getSitelinks($search_results));
                $all_ppc_ad_urls = getPaidSearchAds($search_results);
                $own_ppc_ad_found = checkForOwnPpcAd($all_ppc_ad_urls, $ga_site_domain);
                echo "\t".$own_ppc_ad_found;
                $ranking_check_delay = rand(30,60);
                sleep($ranking_check_delay);
                ?>
            </td>
        </tr>
        <?php
        //insert results into the DB (if ranking is not 0)
        //if ($ranking != 0) {
            insertIntoKeywordVisitsRankingsMySQLTable($result, $is_brand, 'CURRENT_DATE', $visits, $ranking, $ga_profile_id);
        //}
    endforeach
    ?>
</table>

<?php
$ga = new gapi($ga_email, $ga_password);
$filter = getQueryFilterNonBrandKeyword($ga_profile_id);
$is_brand = 0;
$ga->requestReportData($ga_profile_id, array('keyword'), array('visits'), $sort_metric, $filter, $start_date = $_GET["startdate"], $end_date = $_GET["enddate"], $start_index, $maxresult);
?>
<p>Data from <?php echo $_GET["startdate"] ?> to <?php echo $_GET["enddate"] ?>.</p>
<table>
    <tr>
        <th><a href="#" onclick="loadXMLDoc3('keyword')">Keyword</a></th>
        <th><a href="#" onclick="loadXMLDoc3('-visits')">Visits</a></th>
        <th><a href="#" >Ranking</a></th>
    </tr>
    <?php
    //create MySQL table for storing daily keywords, visits and ranking results
    createKeywordVisitsRankingsMySQLTable($ga_profile_id);

    //create MySQL table for storing keywords and their search volumes
    createKeywordVolumesMySQLTable($ga_profile_id);

    //print results
    foreach ($ga->getResults() as $result):
        ?>
        <tr>
            <td>
                <?php
                //store in DB
                echo $result;
                ?>
            </td>
            <td>
                <?php
                //store in DB
                $visits = $result->getVisits();
                echo $visits;
                ?>
            </td>
            <td>
                <?php
                $search_results = getSearchResultContent($result, $ga_site_domain);
                $ranking = getRanking($search_results, $ga_site_domain);
                echo $ranking;
                $sitelinks = count(getSitelinks($search_results));
                $ranking_check_delay = rand(30,60);
                sleep($ranking_check_delay);
                ?>
            </td>
        </tr>
        <?php
        //insert results into the DB (if ranking is not 0)
        //if ($ranking != 0) {
            insertIntoKeywordVisitsRankingsMySQLTable($result, $is_brand, 'CURRENT_DATE', $visits, $ranking, $ga_profile_id);
        //}
    endforeach
    ?>
</table>

<table id="missing-volumes">
    <?php
    //get all keywords which are missing from the search volumes tables
    $result = checkIfKeywordMissingInKeywordVolumesMySQLTable($ga_profile_id);
    $counter = '0';
    $missing_keywords = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $missing_keywords["$counter"] = $row['keyword'];
        $counter++;
    }
    if ($missing_keywords != null) {
        echo "<tr><th>Keywords without search volume data</th></tr>";
        foreach ($missing_keywords as $value) {
            echo "<tr><td>$value</td></tr>";
        }
    }
    //TERMINATE THE SESSION???
    ?>
</table>
<p><a href="https://adwords.google.com/select/KeywordToolExternal" target="_blank">AdWords Keywords Tool</a></p>
<p><a href="http://localhost/phpmyadmin/" target="_blank">Localhost PHPmyadmin</a></p>

<form method="post" action="ctr-updated-confirmation.php">
    <input type="submit" value="Update CTRs" />
</form>
