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
<table border="1">
    <tr>
        <th><a href="#" onclick="loadXMLDoc3('keyword')">Keyword</a></th>
        <th><a href="#" onclick="loadXMLDoc3('-visits')">Visits</a></th>
        <th><a href="#" >Ranking</a></th>
        <th><a href="#" ># of Organic Sitelinks</a></th>
        <th><a href="#" ># of PPC Ads</a></th>
        <th><a href="#" >Own PPC Ad Found</a></th>
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
                ?>
            </td>
            <td>
                <?php
                $sitelinks = getSitelinks($search_results);
                $num_of_sitelinks = countAllSitelinks($sitelinks);
                echo $num_of_sitelinks;
                ?>
            </td>
            <td>
                <?php
                $all_ppc_ad_urls = getPaidSearchAds($search_results);
                $num_of_ppc_ads = countAllPpcAd($all_ppc_ad_urls);
                echo $num_of_ppc_ads;
                ?>
            </td>
            <td>
                <?php
                $own_ppc_ad_found = checkForOwnPpcAd($all_ppc_ad_urls, $ga_site_domain);
                echo $own_ppc_ad_found;
                ?>
            </td>
        </tr>
        <?php
        //delay before querying google again
        $ranking_check_delay = rand(30, 60);
        sleep($ranking_check_delay);
        //insert results into the DB (if ranking is not 0)
        //if ($ranking != 0) {
        insertIntoKeywordVisitsRankingsMySQLTable($result, $is_brand, 'CURRENT_DATE', $visits, $ranking, $num_of_sitelinks, $num_of_ppc_ads, $own_ppc_ad_found, $ga_profile_id);
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
<table border="1">
    <tr>
        <th><a href="#" onclick="loadXMLDoc3('keyword')">Keyword</a></th>
        <th><a href="#" onclick="loadXMLDoc3('-visits')">Visits</a></th>
        <th><a href="#" >Ranking</a></th>
        <th><a href="#" ># of Organic Sitelinks</a></th>
        <th><a href="#" ># of PPC Ads</a></th>
        <th><a href="#" >Own PPC Ad Found</a></th>
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
                ?>
            </td>
            <td>
                <?php
                $sitelinks = getSitelinks($search_results);
                $num_of_sitelinks = countAllSitelinks($sitelinks);
                echo $num_of_sitelinks;
                ?>
            </td>
            <td>
                <?php
                $all_ppc_ad_urls = getPaidSearchAds($search_results);
                $num_of_ppc_ads = countAllPpcAd($all_ppc_ad_urls);
                echo $num_of_ppc_ads;
                ?>
            </td>
            <td>
                <?php
                $own_ppc_ad_found = checkForOwnPpcAd($all_ppc_ad_urls, $ga_site_domain);
                echo $own_ppc_ad_found;
                ?>
            </td>
        </tr>
        <?php
        //delay before querying google again
        $ranking_check_delay = rand(30, 60);
        sleep($ranking_check_delay);
        //insert results into the DB (if ranking is not 0)
        //if ($ranking != 0) {
        insertIntoKeywordVisitsRankingsMySQLTable($result, $is_brand, 'CURRENT_DATE', $visits, $ranking, $num_of_sitelinks, $num_of_ppc_ads, $own_ppc_ad_found, $ga_profile_id);
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
    ?>
</table>
<p><a href="https://adwords.google.com/select/KeywordToolExternal" target="_blank">AdWords Keywords Tool</a></p>
<p><a href="http://localhost/phpmyadmin/" target="_blank">Localhost PHPmyadmin</a></p>

<form method="post" action="ctr-updated-confirmation.php">
    <input type="submit" value="Update CTRs" />
</form>
