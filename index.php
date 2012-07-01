<?php session_start(); ?>
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
            <select name="domaintocheck" id="domaintocheck">
                <option>kia.co.uk</option>
                <option>nationalexpress.com</option>
                <option>sunlifedirect.co.uk</option>
                <option>eastmidlandstrains.co.uk</option>
                <option>mazumamobile.com</option>
                <option>eastcoast.co.uk</option>
            </select> <br />
            Max results: <input type="text" name="maxresult" id="maxresult" value="10" /><br />
            <button type="button" onclick="loadXMLDoc3('-visits')">Extract Visits and Rankings</button>
            <button type="button" onclick="loadXMLDoc4()">Update CTRs</button>
        </form>

        <hr />

        <div id="myDiv"></div>
        <div id="myDiv2"></div>



        <!-- 
        <h1>JavaScript GA Authentication and Extraction</h1>
        <button id="authButton">Loading...</button>
        <div id="dataControls" style="display:none">
            <p>
                <button id="getAccount">Select Profile</button>
            </p>

            <p>
                <button id="getData">Get Sample Report Data</button>
            </p>
        </div>
        <div id="outputDiv"></div>
        <img src="dummy.gif" style="display:none" alt="required for Google Data"/>
        <hr />
        -->
        <?php
        $_SESSION['email'] = $ga_email;
        $_SESSION['password'] = $ga_password;
        $_SESSION['profileid'] = $ga_profileid;
        ?>
    </body>
</html>
