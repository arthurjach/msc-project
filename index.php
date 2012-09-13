<?php session_start(); 

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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <script language="javascript" src="js/loadxml.js"></script>
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script type="text/javascript" src="js/ga-authenticate.js"></script>
        <link rel="stylesheet" type="text/css" href="styles/styles.css" />
        <title></title>
    </head>
    <body>

        <?php
        $ga_email = $_POST["email"];
        $ga_password = $_POST["password"];
        $ga_profileid_temp = explode("(", $_POST["profileid"]);

        //302 to the login page if login credentials not set
        if (empty($ga_email) || empty($ga_password) || empty($ga_profileid_temp)) {
            echo '<script type="text/javascript">window.location = "ga-login.php"</script>';
        }

        $ga_profileid = str_replace(")", "", $ga_profileid_temp[1]);
        ?>

        <h1>Click-through rate extraction tool</h1>
        <p>Current profile: <?php echo $ga_profileid_temp[0] ?> (<?php echo $ga_profileid ?>)</p>
        <form name="getugc" method="get" action="gapi/generate-report.php">
            <input name="email" type="hidden" value="<?php echo $ga_email; ?>" />
            <input name="password" type="hidden" value="<?php echo $ga_password; ?>" />
            <input name="profileid" type="hidden" value="<?php echo $ga_profileid; ?>" />
            Start Date: <input type="text" name="startdate" id="startdate" value="<?php echo date("Y-m-d", time() - 60 * 60 * 24); ?>" /><br />
            End Date: <input type="text" name="enddate" id="enddate" value="<?php echo date("Y-m-d", time() - 60 * 60 * 24); ?>" /><br />
            <!-- Domain name: <input type="text" name="domaintocheck" id="domaintocheck" />--><br />
            Domain name:
            <!-- Please note that in order to keep the data anonymous the following 
            list of domains has been removed. In order to run the application this must be updated-->
            <select name="domaintocheck" id="domaintocheck">
                <option>domain1.co.uk</option>
                <option>domain2.com</option>
                <option>domain3.co.uk</option>
                <option>domain4.co.uk</option>
                <option>domain5.com</option>
                <option>domain6.co.uk</option>
                <option>domain7.com</option>
            </select> <br />
            Max results: <input type="text" name="maxresult" id="maxresult" value="10" /><br />
            <button type="button" onclick="loadXMLDoc3('-visits')">Extract Visits and Rankings</button>
            <button type="button" onclick="loadXMLDoc4()">Update CTRs</button>
        </form>

        <hr />

        <div id="myDiv"></div>
        <div id="myDiv2"></div>

        <?php
        $_SESSION['email'] = $ga_email;
        $_SESSION['password'] = $ga_password;
        $_SESSION['profileid'] = $ga_profileid;
        ?>
    </body>
</html>
