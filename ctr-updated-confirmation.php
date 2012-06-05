<?php

session_start();

require 'gapi/gapi.class.php';
require('mysql/my-sql-comms.php');

//$ga_profile_id = $_GET["profileid"];
$ga_profile_id = $_SESSION['profileid'];
sleep(5);
updateClickThroughRates($ga_profile_id);

unset($_SESSION['profileid']);
session_destroy();

?>
