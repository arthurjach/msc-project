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

require 'gapi.class.php';

$ga_email = $_POST["email"];
$ga_password = $_POST["password"];

$ga = new gapi($ga_email, $ga_password);

$ga->requestAccountData();
echo '<h1>Select the account</h1>';
echo '<form method="post" action="../index.php"><select name="profileid"><option value="">Select...</option>';
foreach ($ga->getResults() as $result) {
    echo '<option>' . $result . '  (' . $result->getProfileId() . ')</option>';
}
echo '</select><input name="email" type="hidden" value="' . $ga_email . '" />
        <input name="password" type="hidden" value="' . $ga_password . '" />
        <input type="submit" /></form>';
