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

define('ga_email','arthurjach@googlemail.com');
define('ga_password','skarbeczek1');

require 'gapi.class.php';

$ga = new gapi(ga_email,ga_password,isset($_SESSION['ga_auth_token'])?$_SESSION['ga_auth_token']:null);
$_SESSION['ga_auth_token'] = $ga->getAuthToken();

echo 'Token: ' . $_SESSION['ga_auth_token'];
?>