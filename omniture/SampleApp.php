
<!-- saved from url=(0067)https://raw.github.com/tonychang/PhpRestClient/master/SampleApp.php -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><style id="wrc-middle-css" type="text/css">.wrc_whole_window{	display: none;	position: fixed; 	z-index: 2147483647;	background-color: rgba(40, 40, 40, 0.9);	word-spacing: normal !important;	margin: 0px !important;	padding: 0px !important;	border: 0px !important;	left: 0px;	top: 0px;	width: 100%;	height: 100%;	line-height: normal !important;	letter-spacing: normal !important;	overflow: hidden;}.wrc_bar_window{	display: none;	position: fixed; 	z-index: 2147483647;	background-color: rgba(60, 60, 60, 1.0);	word-spacing: normal !important;	font-family: Segoe UI, Arial Unicode MS, Arial, Sans-Serif;	margin: 0px !important;	padding: 0px !important;	border: 0px !important;	left: 0px;	top: 0px;	width: 100%;	height: 40px;	line-height: normal !important;	letter-spacing: normal !important;	color: white !important;	font-size: 13px !important;}.wrc_middle {	display: table-cell;	vertical-align: middle;	width: 100%;}.wrc_middle_main {	font-family: Segoe UI, Arial Unicode MS, Arial, Sans-Serif;	font-size: 14px;	width: 600px;	height: auto;    background: url(chrome-extension://icmlaeflemplmjndnaapfdbbnpncnbda/skin/images/background-body.jpg) repeat-x left top;	background-color: rgb(39, 53, 62);	position: relative;	margin-left: auto;	margin-right: auto;	text-align: left;}.wrc_middle_tq_main {	font-family: Segoe UI, Arial Unicode MS, Arial, Sans-Serif;	font-size: 16px;	width: 615px;	height: 460px;    background: url(chrome-extension://icmlaeflemplmjndnaapfdbbnpncnbda/skin/images/background-sitecorrect.png) no-repeat;	background-color: white;	color: black !important;	position: relative;	margin-left: auto;	margin-right: auto;	text-align: center;}.wrc_middle_logo {    background: url(chrome-extension://icmlaeflemplmjndnaapfdbbnpncnbda/skin/images/logo.jpg) no-repeat left bottom;    width: 140px;    height: 42px;    color: orange;    display: table-cell;    text-align: right;    vertical-align: middle;}.wrc_icon_warning {	margin: 20px 10px 20px 15px;	float: left;	background-color: transparent;}.wrc_middle_title {    color: #b6bec7;	height: auto;    margin: 0px auto;	font-size: 2.2em;	white-space: nowrap;	text-align: center;}.wrc_middle_hline {    height: 2px;	width: 100%;    display: block;}.wrc_middle_description {	text-align: center;	margin: 15px;	font-size: 1.4em;	padding: 20px;	height: auto;	color: white;	min-height: 3.5em;}.wrc_middle_actions_main_div {	margin-bottom: 15px;	text-align: center;}.wrc_middle_actions_blue_button div {	display: inline-block;	width: auto;	cursor: Pointer;	margin: 3px 10px 3px 10px;	color: white;	font-size: 1.2em;	font-weight: bold;}.wrc_middle_actions_blue_button {	-moz-appearance: none;	border-radius: 7px;	-moz-border-radius: 7px/7px;	border-radius: 7px/7px;	background-color: rgb(0, 173, 223) !important;	display: inline-block;	width: auto;	cursor: Pointer;	border: 2px solid #00dddd;	padding: 0px 20px 0px 20px;}.wrc_middle_actions_blue_button:hover {	background-color: rgb(0, 159, 212) !important;}.wrc_middle_actions_blue_button:active {	background-color: rgb(0, 146, 200) !important;	border: 2px solid #00aaaa;}.wrc_middle_actions_grey_button div {	display: inline-block;	width: auto;	cursor: Pointer;	margin: 3px 10px 3px 10px;	color: white !important;	font-size: 15px;	font-weight: bold;}.wrc_middle_actions_grey_button {	-moz-appearance: none;	border-radius: 7px;	-moz-border-radius: 7px/7px;	border-radius: 7px/7px;	background-color: rgb(100, 100, 100) !important;	display: inline-block;	width: auto;	cursor: Pointer;	border: 2px solid #aaaaaa;	text-decoration: none;	padding: 0px 20px 0px 20px;}.wrc_middle_actions_grey_button:hover {	background-color: rgb(120, 120, 120) !important;}.wrc_middle_actions_grey_button:active {	background-color: rgb(130, 130, 130) !important;	border: 2px solid #00aaaa;}.wrc_middle_action_low {	font-size: 0.9em;	white-space: nowrap;	cursor: Pointer;	color: grey !important;	margin: 10px 10px 0px 10px;	text-decoration: none;}.wrc_middle_action_low:hover {	color: #aa4400 !important;}.wrc_middle_actions_rest_div {	padding-top: 5px;	white-space: nowrap;	text-align: center;}.wrc_middle_action {	white-space: nowrap;	cursor: Pointer;	color: red !important;	font-size: 1.2em;	margin: 10px 10px 0px 10px;	text-decoration: none;}.wrc_middle_action:hover {	color: #aa4400 !important;}</style><script id="wrc-script-middle_window" type="text/javascript" language="JavaScript">var g_inputsCnt = 0;var g_InputThis = new Array(null, null, null, null);var g_alerted = false;/* we test the input if it includes 4 digits   (input is a part of 4 inputs for filling the credit-card number)*/function is4DigitsCardNumber(val){	var regExp = new RegExp('[0-9]{4}');	return (val.length == 4 && val.search(regExp) == 0);}/* testing the whole credit-card number 19 digits devided by three '-' symbols or   exactly 16 digits without any dividers*/function isCreditCardNumber(val){	if(val.length == 19)	{		var regExp = new RegExp('[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}');		return (val.search(regExp) == 0);	}	else if(val.length == 16)	{		var regExp = new RegExp('[0-9]{4}[0-9]{4}[0-9]{4}[0-9]{4}');		return (val.search(regExp) == 0);	}	return false;}function CheckInputOnCreditNumber(self){	if(g_alerted)		return false;	var value = self.value;	if(self.type == 'text')	{		if(is4DigitsCardNumber(value))		{			var cont = true;			for(i = 0; i < g_inputsCnt; i++)				if(g_InputThis[i] == self)					cont = false;			if(cont && g_inputsCnt < 4)			{				g_InputThis[g_inputsCnt] = self;				g_inputsCnt++;			}		}		g_alerted = (g_inputsCnt == 4);		if(g_alerted)			g_inputsCnt = 0;		else			g_alerted = isCreditCardNumber(value);	}	return g_alerted;}function CheckInputOnPassword(self){	if(g_alerted)		return false;	var value = self.value;	if(self.type == 'password')	{		g_alerted = (value.length > 0);	}	return g_alerted;}function onInputBlur(self, bRatingOk, bFishingSite){	var bCreditNumber = CheckInputOnCreditNumber(self);	var bPassword = CheckInputOnPassword(self);	if((!bRatingOk || bFishingSite == 1) && (bCreditNumber || bPassword) )	{		var warnDiv = document.getElementById("wrcinputdiv");		if(warnDiv)		{			/* show the warning div in the middle of the screen */			warnDiv.style.left = "0px";			warnDiv.style.top = "0px";			warnDiv.style.width = "100%";			warnDiv.style.height = "100%";			document.getElementById("wrc_warn_fs").style.display = 'none';			document.getElementById("wrc_warn_cn").style.display = 'none';			if(bFishingSite)				document.getElementById("wrc_warn_fs").style.display = 'block';			else				document.getElementById("wrc_warn_cn").style.display = 'block';			warnDiv.style.display = 'table';		}	}}</script></head><body><pre style="word-wrap: break-word; white-space: pre-wrap;">&lt;?php
    require_once("SimpleRestClient.php");
    $xml=null;
    $restclient=null;
    $result=null;
    
    $cert_file=null;//Path to cert file 
    $key_file=null;//Path to private key
    $key_password=null;//Private key passphrase
    $curl_opts=null;//Array to set additional CURL options or override the default options of the SimpleRestClient
    $post_data=null;//Array or string to set POST data 
    $user_agent = "PHP Sample Rest Client";
    $url = "https://ws.admin.washington.edu/student/v4/public/course/2009,summer,info,344/a";

    $restclient = new SimpleRestClient($cert_file, $key_file, $key_password, $user_agent, $curl_opts);
    
    if (!is_null($post_data))
    {
      $restclient-&gt;postWebRequest($url, $post_data); 
    }
    else
    {
      $restclient-&gt;getWebRequest($url); 
    }
?&gt;
 &lt;html&gt;
 &lt;head&gt;
    &lt;title&gt;Sample App&lt;/title&gt;
 &lt;/head&gt;
 &lt;body&gt;
    &lt;span&gt;&lt;b&gt;Requested Url: &lt;/b&gt;&lt;?php echo $url; ?&gt; &lt;/span&gt;&lt;br /&gt;
    &lt;br /&gt;
    &lt;span&gt;&lt;b&gt;Status Code: &lt;/b&gt;&lt;/span&gt;
    &lt;div id="status_code"&gt;
        &lt;?php
            if (!is_null($restclient))
            {
                //Get the Http_Status_Code
                echo 'Http Status Code: ' . $restclient-&gt;getStatusCode() . '&lt;br /&gt;';
                $response = $restclient-&gt;getWebResponse();
                //Get the error message returned from web service
                $xml = simplexml_load_string($response);

                if (!is_null($xml))
                {
                    $result = $xml-&gt;xpath('//div[@class="status_description"]');
                    if (!is_null($result) &amp;&amp; !empty($result))
                    {
                        echo 'Web Service Error Message: ' . $result[0] . '&lt;br /&gt;';;
                    }
                }
            }
        ?&gt;
    &lt;/div&gt;
    &lt;br /&gt;
    &lt;span&gt;&lt;b&gt;Response: &lt;/b&gt;&lt;/span&gt;
    &lt;div id="response"&gt;
        &lt;textarea id="response_output" rows="10" cols="150"&gt;
            &lt;?php
                if (!is_null($restclient))
                {
                  echo $restclient-&gt;getWebResponse();
                }
            ?&gt;
        &lt;/textarea&gt;
    &lt;/div&gt;
    &lt;br /&gt;
    &lt;span&gt;&lt;b&gt;Class Detail: &lt;/b&gt;&lt;/span&gt;
    &lt;div id="content"&gt;
        &lt;?php
            if (!is_null($xml) &amp;&amp; $restclient-&gt;getStatusCode() == 200 &amp;&amp; is_null($post_data))
            {
                echo 'Title: ' . $xml-&gt;head-&gt;title . '&lt;br /&gt;'; //Get xml data via object drill down created by simplexml
                $result = $xml-&gt;xpath('//div/a/span[@class="curriculum_abbreviation"]'); //Get XML data via Xpath queries
                echo "Curr Abbrev: " . $result[0]-&gt;asXml() . '&lt;br /&gt;';
                $result = $xml-&gt;xpath('//div/span[@class="course_branch"]');
                echo "Branch: " . $result[0]-&gt;asXml() . '&lt;br /&gt;';;
                $result = $xml-&gt;xpath('//div/span[@class="section_id"]');
                echo "Section ID: " . $result[0]-&gt;asXml() . '&lt;br /&gt;';;
                $result = $xml-&gt;xpath('//div/span[@class="sln"]');
                echo "SLN: " . $result[0]-&gt;asXml();
            }
        ?&gt;
    &lt;/div&gt;
 &lt;/body&gt;
 &lt;/html&gt;
</pre></body></html>