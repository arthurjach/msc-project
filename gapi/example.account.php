<?php

//define('ga_email','arthurjach@googlemail.com');
//define('ga_password','skarbeczek1');

require 'gapi.class.php';

$ga_email = $_POST["email"];
$ga_password = $_POST["password"];

$ga = new gapi($ga_email, $ga_password);

$ga->requestAccountData();

echo '<form method="post" action="../index.php"><select name="profileid"><option value="">Select...</option>';
foreach ($ga->getResults() as $result) {
    echo '<option>' . $result . '  (' . $result->getProfileId() . ')</option>';
}
echo '</select><input name="email" type="hidden" value="' . $ga_email . '" />
        <input name="password" type="hidden" value="' . $ga_password . '" />
        <input type="submit" /></form>';
