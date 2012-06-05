<?php

require 'gapi/gapi.class.php';
require('mysql/my-sql-comms.php');

$ga_profile_id = $_GET["profileid"];
sleep(5);
updateClickThroughRates($ga_profile_id);

?>
