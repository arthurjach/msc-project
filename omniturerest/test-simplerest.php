<?php

require 'simple-rest-client.php';

setOption(CURLOPT_HTTPHEADER, array("X-WSSE: UsernameToken Username=\"$username\", PasswordDigest=\"$digest\", Nonce=\"$nonce\", Created=\"$nonce_ts\""));

    $query="?method=Company.GetTokenUsage";

    $rc->getWebRequest($server.$path.$query);

    if ($rc->getStatusCode()==200) {
        $response=$rc->getWebResponse();
        var_dump($response);
    } else {
        echo "something went wrong\n";
        var_dump($rc->getInfo());
    }
?>

?>
