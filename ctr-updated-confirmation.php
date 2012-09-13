<?php

session_start();

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

require 'gapi/gapi.class.php';
require('mysql/my-sql-comms.php');

//$ga_profile_id = $_GET["profileid"];
$ga_profile_id = $_SESSION['profileid'];
sleep(5);
updateClickThroughRates($ga_profile_id);

unset($_SESSION['profileid']);
session_destroy();

echo "<script type=\"text/javascript\">";
echo "window.location = \"index.php\"";
echo "</script>";

?>
