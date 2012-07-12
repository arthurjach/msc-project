<?php

/*
 * Username:        mayang:Media Contacts UK - Dallas	
  Shared Secret:   b4c1b58fd25b21f52b87ae5b2179e6db
 * https://developer.omniture.com/fr_FR/blog/how-to-start-with-the-omniture-rest-api-in-php
 */

include_once("SimpleRestClient.class.php");

$username = 'mayang:Media Contacts UK - Dallas';
$secret = 'b4c1b58fd25b21f52b87ae5b2179e6db';
$nonce = md5(uniqid(php_uname('n'), true));
$nonce_ts = date('c');

$digest = base64_encode(sha1($nonce . $nonce_ts . $secret));

$server = "https://api2.omniture.com";
$path = "/admin/1.3/rest/";

$rc = new SimpleRestClient();
$rc->setOption(CURLOPT_HTTPHEADER, array("X-WSSE: UsernameToken Username=\"$username\", PasswordDigest=\"$digest\", Nonce=\"$nonce\", Created=\"$nonce_ts\""));

$query = "?method=Company.GetTokenUsage";

$rc->getWebRequest($server . $path . $query);

if ($rc->getStatusCode() == 200) {
    $response = $rc->getWebResponse();
    var_dump($response);
} else {
    echo "something went wrong\n";
    var_dump($rc->getInfo());
}
?>
