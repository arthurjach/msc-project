<?php

$keywords = array(
    'kia',
    'kia cars',
    'kia sportage',
    'car kia',
    'kia car',
    'cars kia',
    'rio kia',
    'kia rio',
    'kia picanto',
    'kia sport',
    'kia sorento',
    'kia sport age',
    'kia vehicles',
    'kia review',
    'kia reviews',
    'kia sedona',
    'kia cee',
    'kia cee d',
    '2011 kia',
    'kia 2011',
    'kia uk',
    'used kia',
    'kia used',
    'kia soul',
    'new kia',
    'kia new',
    'kia for sale',
    'kia sale',
    'kia dealers',
    'kia dealer',
    'kia carens',
    'kia dealerships',
    'kia dealership',
    'kia motor',
    'kia 2011 sportage',
    '2011 kia sportage',
    'kia sportage 2011',
    'review kia sportage',
    'kia sportage review',
    'kia sportage reviews',
    'kia parts',
    'kia diesel',
    'kia price',
    'price kia',
    'kia optima',
    'optima kia',
    'kia prices',
    'kia rio review',
    'kia deals',
    'kia service',
    'kia ora'
);

require_once 'RankingChecker.php';
$apiKey = 'AIzaSyATVf03mhFEShpkG1_IVwJ7hYUWdHI5scs';
$rankingChecker = new RankingChecker($apiKey);
$rankingChecker->setLocale('en', 'gb');
$rankings = $rankingChecker->check($keywords, array('kia.co.uk'));

var_dump($rankings);
?>
