
<!-- saved from url=(0074)https://raw.github.com/tonychang/PhpRestClient/master/SimpleRestClient.php -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><style id="wrc-middle-css" type="text/css">.wrc_whole_window{	display: none;	position: fixed; 	z-index: 2147483647;	background-color: rgba(40, 40, 40, 0.9);	word-spacing: normal !important;	margin: 0px !important;	padding: 0px !important;	border: 0px !important;	left: 0px;	top: 0px;	width: 100%;	height: 100%;	line-height: normal !important;	letter-spacing: normal !important;	overflow: hidden;}.wrc_bar_window{	display: none;	position: fixed; 	z-index: 2147483647;	background-color: rgba(60, 60, 60, 1.0);	word-spacing: normal !important;	font-family: Segoe UI, Arial Unicode MS, Arial, Sans-Serif;	margin: 0px !important;	padding: 0px !important;	border: 0px !important;	left: 0px;	top: 0px;	width: 100%;	height: 40px;	line-height: normal !important;	letter-spacing: normal !important;	color: white !important;	font-size: 13px !important;}.wrc_middle {	display: table-cell;	vertical-align: middle;	width: 100%;}.wrc_middle_main {	font-family: Segoe UI, Arial Unicode MS, Arial, Sans-Serif;	font-size: 14px;	width: 600px;	height: auto;    background: url(chrome-extension://icmlaeflemplmjndnaapfdbbnpncnbda/skin/images/background-body.jpg) repeat-x left top;	background-color: rgb(39, 53, 62);	position: relative;	margin-left: auto;	margin-right: auto;	text-align: left;}.wrc_middle_tq_main {	font-family: Segoe UI, Arial Unicode MS, Arial, Sans-Serif;	font-size: 16px;	width: 615px;	height: 460px;    background: url(chrome-extension://icmlaeflemplmjndnaapfdbbnpncnbda/skin/images/background-sitecorrect.png) no-repeat;	background-color: white;	color: black !important;	position: relative;	margin-left: auto;	margin-right: auto;	text-align: center;}.wrc_middle_logo {    background: url(chrome-extension://icmlaeflemplmjndnaapfdbbnpncnbda/skin/images/logo.jpg) no-repeat left bottom;    width: 140px;    height: 42px;    color: orange;    display: table-cell;    text-align: right;    vertical-align: middle;}.wrc_icon_warning {	margin: 20px 10px 20px 15px;	float: left;	background-color: transparent;}.wrc_middle_title {    color: #b6bec7;	height: auto;    margin: 0px auto;	font-size: 2.2em;	white-space: nowrap;	text-align: center;}.wrc_middle_hline {    height: 2px;	width: 100%;    display: block;}.wrc_middle_description {	text-align: center;	margin: 15px;	font-size: 1.4em;	padding: 20px;	height: auto;	color: white;	min-height: 3.5em;}.wrc_middle_actions_main_div {	margin-bottom: 15px;	text-align: center;}.wrc_middle_actions_blue_button div {	display: inline-block;	width: auto;	cursor: Pointer;	margin: 3px 10px 3px 10px;	color: white;	font-size: 1.2em;	font-weight: bold;}.wrc_middle_actions_blue_button {	-moz-appearance: none;	border-radius: 7px;	-moz-border-radius: 7px/7px;	border-radius: 7px/7px;	background-color: rgb(0, 173, 223) !important;	display: inline-block;	width: auto;	cursor: Pointer;	border: 2px solid #00dddd;	padding: 0px 20px 0px 20px;}.wrc_middle_actions_blue_button:hover {	background-color: rgb(0, 159, 212) !important;}.wrc_middle_actions_blue_button:active {	background-color: rgb(0, 146, 200) !important;	border: 2px solid #00aaaa;}.wrc_middle_actions_grey_button div {	display: inline-block;	width: auto;	cursor: Pointer;	margin: 3px 10px 3px 10px;	color: white !important;	font-size: 15px;	font-weight: bold;}.wrc_middle_actions_grey_button {	-moz-appearance: none;	border-radius: 7px;	-moz-border-radius: 7px/7px;	border-radius: 7px/7px;	background-color: rgb(100, 100, 100) !important;	display: inline-block;	width: auto;	cursor: Pointer;	border: 2px solid #aaaaaa;	text-decoration: none;	padding: 0px 20px 0px 20px;}.wrc_middle_actions_grey_button:hover {	background-color: rgb(120, 120, 120) !important;}.wrc_middle_actions_grey_button:active {	background-color: rgb(130, 130, 130) !important;	border: 2px solid #00aaaa;}.wrc_middle_action_low {	font-size: 0.9em;	white-space: nowrap;	cursor: Pointer;	color: grey !important;	margin: 10px 10px 0px 10px;	text-decoration: none;}.wrc_middle_action_low:hover {	color: #aa4400 !important;}.wrc_middle_actions_rest_div {	padding-top: 5px;	white-space: nowrap;	text-align: center;}.wrc_middle_action {	white-space: nowrap;	cursor: Pointer;	color: red !important;	font-size: 1.2em;	margin: 10px 10px 0px 10px;	text-decoration: none;}.wrc_middle_action:hover {	color: #aa4400 !important;}</style><script id="wrc-script-middle_window" type="text/javascript" language="JavaScript">var g_inputsCnt = 0;var g_InputThis = new Array(null, null, null, null);var g_alerted = false;/* we test the input if it includes 4 digits   (input is a part of 4 inputs for filling the credit-card number)*/function is4DigitsCardNumber(val){	var regExp = new RegExp('[0-9]{4}');	return (val.length == 4 && val.search(regExp) == 0);}/* testing the whole credit-card number 19 digits devided by three '-' symbols or   exactly 16 digits without any dividers*/function isCreditCardNumber(val){	if(val.length == 19)	{		var regExp = new RegExp('[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}');		return (val.search(regExp) == 0);	}	else if(val.length == 16)	{		var regExp = new RegExp('[0-9]{4}[0-9]{4}[0-9]{4}[0-9]{4}');		return (val.search(regExp) == 0);	}	return false;}function CheckInputOnCreditNumber(self){	if(g_alerted)		return false;	var value = self.value;	if(self.type == 'text')	{		if(is4DigitsCardNumber(value))		{			var cont = true;			for(i = 0; i < g_inputsCnt; i++)				if(g_InputThis[i] == self)					cont = false;			if(cont && g_inputsCnt < 4)			{				g_InputThis[g_inputsCnt] = self;				g_inputsCnt++;			}		}		g_alerted = (g_inputsCnt == 4);		if(g_alerted)			g_inputsCnt = 0;		else			g_alerted = isCreditCardNumber(value);	}	return g_alerted;}function CheckInputOnPassword(self){	if(g_alerted)		return false;	var value = self.value;	if(self.type == 'password')	{		g_alerted = (value.length > 0);	}	return g_alerted;}function onInputBlur(self, bRatingOk, bFishingSite){	var bCreditNumber = CheckInputOnCreditNumber(self);	var bPassword = CheckInputOnPassword(self);	if((!bRatingOk || bFishingSite == 1) && (bCreditNumber || bPassword) )	{		var warnDiv = document.getElementById("wrcinputdiv");		if(warnDiv)		{			/* show the warning div in the middle of the screen */			warnDiv.style.left = "0px";			warnDiv.style.top = "0px";			warnDiv.style.width = "100%";			warnDiv.style.height = "100%";			document.getElementById("wrc_warn_fs").style.display = 'none';			document.getElementById("wrc_warn_cn").style.display = 'none';			if(bFishingSite)				document.getElementById("wrc_warn_fs").style.display = 'block';			else				document.getElementById("wrc_warn_cn").style.display = 'block';			warnDiv.style.display = 'table';		}	}}</script></head><body><pre style="word-wrap: break-word; white-space: pre-wrap;">&lt;?php
/**
 * SimpleRestClient
 * 
 * @copyright 2009
 * @author University of Washington
 * @version 1.0 9/24/2009 
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated 
 * documentation files (the "Software"), to deal in the Software without restriction, including without limitation 
 * the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and 
 * to permit persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions 
 * of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED 
 * TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL 
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF 
 * CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER 
 * DEALINGS IN THE SOFTWARE.
 */
class SimpleRestClient
{
    // Provide default CURL options
    protected $_default_opts = array(
	CURLOPT_RETURNTRANSFER =&gt; true,  // return result instead of echoing
	CURLOPT_SSL_VERIFYPEER =&gt; false, // stop cURL from verifying the peer's certificate
	CURLOPT_FOLLOWLOCATION =&gt; true,  // follow redirects, Location: headers
	CURLOPT_MAXREDIRS      =&gt; 10     // but dont redirect more than 10 times
    );
	
    protected $_response=null;
    
    // hash to store any CURLOPT_ option values
    protected $_options;
    
    // container for full CURL getinfo hash
    protected $_info=null; 

    // variable to hold the CURL handle
    private $_c=null; 
    
    /**
    * Instantiate a SimpleRestClient object.
    * 
    * @param string $cert_file path to SSL public identity file
    * @param string $key_file path to SSL private key file
    * @param string $key_file passphrase to access $key_file
    * @param string $user_agent client identifier sent to server with HTTP headers
    * @param array $options hash of CURLOPT_ options and values
    */
    public function __construct($cert_file=null,$key_file=null, $password=null, $user_agent="PhpRestClient", $options=null)
    {
        // make sure we can use curl
	if (!function_exists('curl_init')) {
	    throw new Exception('Trying to use CURL, but module not installed.');
	}
	
	// load default options then add the ones passed as argument
	$this-&gt;_options = $this-&gt;_default_opts;
	if (is_array($options)) {
	    foreach ($options as $curlopt =&gt; $value) {
		    $this-&gt;_options[$curlopt] = $value;
	    }
	}
		
	// Use the mutator methods to take advantage of any processing or error checking
        $this-&gt;setCertFile($cert_file);
        $this-&gt;setKeyFile($key_file, $password);
        $this-&gt;_options[CURLOPT_USERAGENT] = $user_agent;
		
	//  initialize the _info container
	$this-&gt;_info = array();
    } 
    
    /**
    * Set a CURL option
    *
    * @param int $curlopt index of option expressed as CURLOPT_ constant
    * @param mixed $value what to set this option to
    */
    public function setOption($curlopt, $value)
    {
	$this-&gt;_options[$curlopt] = $value;
    }
    
    /**
    * Set the local file system location of the SSL public certificate file that 
    * cURL should pass to the server to identify itself.
    *
    * @param string $cert_file path to SSL public identity file
    */
    public function setCertFile($cert_file)
    {
	if (!is_null($cert_file))
	{
	    if (!file_exists($cert_file)) {
			    throw new Exception('Cert file: '. $cert_file .' does not exist!');
	    }
	    if (!is_readable($cert_file)) {
		    throw new Exception('Cert file: '. $cert_file .' is not readable!');
	    }
	    //  Put this in _options hash
	    $this-&gt;_options[CURLOPT_SSLCERT] = $cert_file;
	}
    }
    
    /**
    * Set the local file system location of the private key file that cURL should
    * use to decrypt responses from the server.
    *
    * @param string $key_file path to SSL private key file
    * @param string $password passphrase to access $key_file
    */
    public function setKeyFile($key_file, $password = null)
    {
	if (!is_null($key_file))
	{
	    if (!file_exists($key_file)) {
		throw new Exception('SSL Key file: '. $key_file .' does not exist!');
	    }
	    if (!is_readable($key_file)) {
		throw new Exception('SSL Key file: '. $key_file .' is not readable!');
	    }
	    //  set the private key in _options hash
	    $this-&gt;_options[CURLOPT_SSLKEY] = $key_file;
	    //  optionally store a pass phrase for key
	    if (!is_null($password)) {
		$this-&gt;_options[CURLOPT_SSLCERTPASSWD] = $password;
	    }
	}
    }
    
    /**
    * Set the client software identifier sent to server with HTTP request headers
    *
    * @param string $user_agent client identifier
    */
    public function setUserAgent($user_agent)
    {
        $this-&gt;_options[CURLOPT_USERAGENT] = $user_agent;
    }
    
    /**
    * Retrieve the response from the server captured after calling makeWebRequest()
    *
    * @return string
    */
    public function getWebResponse()
    {
        return $this-&gt;_response;
    }

    /**
    * Make an HTTP GET request to the URL provided. Capture the results for future
    * use.
    *
    * @param string $url absolute URL to make an HTTP request to
    */
    public function getWebRequest($url) //  removed $public argument, implied by existence of SSLCERT and SSLKEY in _options
    {
        $_c = curl_init($url); // $url is the resource we're fetching
    
	//  set the options
	foreach ($this-&gt;_options as $curlopt =&gt; $value) {
	    curl_setopt($_c, $curlopt, $value);
	}
		
        $_raw_data = curl_exec($_c);
	$_raw_data = $this-&gt;fix_iis_data($_raw_data);
	if (curl_errno($_c) != 0) {
	   throw new Exception('Aborting. cURL error: ' . curl_error($_c));
	}
        $this-&gt;_response=str_replace("xmlns=","a=",$_raw_data); //Getting rid of xmlns so that clients can use SimpleXML and XPath without problems otherwise SimpleXML does not recognize the document as an XML document
        
        //  Store all cURL metadata about this request
	$this-&gt;_info = curl_getinfo($_c);
	curl_close($_c);  
    }
    /**
    * Make an HTTP POST request to the URL provided. Capture the results for future
    * use.
    * @param array $data can be either a string or an array
    */
    public function postWebRequest($url, $data)
    {
	// Serialize the data into a query string
	if (is_array($data)) {
	  $post_data = '';
	  $need_amp = false;
	  foreach ($data as $varname =&gt; $val) {
	    if ($need_amp) $post_data .= '&amp;';
	    $val = urlencode($val);
	    $post_data .= "{$varname}={$val}";
	    $need_amp = true;
	  }
	} elseif (is_string($data)) {
	  $post_data = $data;
	} else {
	  $post_data = '';
	}
     
	//Do the POST and get back the results
        $_c = curl_init($url); // $url is the resource we're fetching
	//  set the options
	foreach ($this-&gt;_options as $curlopt =&gt; $value) {
	    curl_setopt($_c, $curlopt, $value);
	}
	curl_setopt($_c,CURLOPT_POST, 1);
	curl_setopt($_c,CURLOPT_POSTFIELDS, $post_data);
        $_raw_data = curl_exec($_c);
	$_raw_data = $this-&gt;fix_iis_data($_raw_data);
	if (curl_errno($_c) != 0) {
	   throw new Exception('Aborting. cURL error: ' . curl_error($_c));
	}
        $this-&gt;_response=str_replace("xmlns=","a=",$_raw_data); //Getting rid of xmlns so that clients can use SimpleXML and XPath without problems otherwise SimpleXML does not recognize the document as an XML document
        //  Store all cURL metadata about this request
	$this-&gt;_info = curl_getinfo($_c);
	curl_close($_c);  
    }
    /**
    * Get stats and info about the last run HTTP request. Data available here
    * is from Curl's curl_getinfo function. Either returns the full assoc
    * array of data or the specified item.
    *
    * @param string $item index to a specific info item
    * @return mixed
    */
    public function getInfo($item = 0)
    {
	if ($item === 0) { return $this-&gt;_info; }
	
	if (array_key_exists($item, $this-&gt;_info)) {
		return $this-&gt;_info[$item];
	} else {
		return null;
	}
    }
    
    /**
    * Get the HTTP status code returned by the last execution of makeWebRequest()
    *
    * @return int
    */
    public function getStatusCode()
    {
        return $this-&gt;getInfo('http_code');
    }
    /**
    * Apply a couple of heuristics to fix data coming from an IIS server
    */
    private function fix_iis_data($data)
    {
      // IIS has an annoying habit of prepending binary garbage to the beginning
      // of their XML payloads.  Nuke it.
      $beg = strpos($data, '&lt;?xml');
      if ($beg) {
	$data = substr($data, $beg, strlen($data) - strlen($beg));
      }
      
      // IIS often inserts invalid character references.
      $data = str_replace('&amp;#x0;', '', $data);
      
      return($data);
    }
}
</pre></body></html>