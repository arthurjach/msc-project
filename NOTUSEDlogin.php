<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>My First Google Analytics Data Export API Script</title>
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script type="text/javascript" src="js/ga-authenticate.js"></script>
    </head>
    <body>
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
    </body>
    <html>

