<?php
/**
 * Google Ranking Checker Class
 * @author DerFichtl AT gmail.com / @DerFichtl on Twitter
 * @version 1.2.0
 * @license http://creativecommons.org/licenses/by-sa/3.0/at/
 * @see http://bohuco.net/blog
 */
Class RankingChecker {
	
	private $googleApiKey = null;
	
	private $googleBaseUrl = 'http://ajax.googleapis.com/ajax/services/search/web?v=1.0';
	
	private $checkPageCount = null;
	
	private $language = 'de';
	
	private $country = 'AT';
	
	
	/**
	 * get an api key from: http://code.google.com/apis/ajaxsearch/signup.html
	 * @param string $googleApiKey
	 * @param int $checkPageCount
	 */
	public function __construct($googleApiKey, $checkPageCount = 5) {
		$this->googleApiKey = $googleApiKey;
		$this->checkPageCount = $checkPageCount;
	}
	
	
	/**
	 * set language and country 
	 * @param string $language
	 * @param string $country
	 */
	public function setLocale($language, $country = null) {
		$this->country = $country;
		$this->language = $language;
	}
	
	
	/**
	 * get rankings
	 * @example $checker->check(array('bohuco'), array('bohuco.net'));
	 * @param array $keywords search these keywords
	 * @param array $domains domains to compare against
	 */
	public function check($keywords, $domains) {
		
		$rankings = array();
		
		if (! is_array($keywords)) { throw new Exception('Keywords array is no array'); }
		if (! is_array($domains)) { throw new Exception('Domains array is no array'); }
		
		foreach($keywords as $keyword) {
			$keyword = trim($keyword);
			$rows = array();
			
			if ($keyword) {
			    for($i=0;$i<$this->checkPageCount;$i++) {
		    		$start = $i*8;
		    		
		    		if (! empty($this->country)) {
		    			$this->country = '&gl='.$this->country;
		    		}
		    		$url = sprintf('%s&hl=%s%s&q=%s&rsz=8&key=%s&start=%s', $this->googleBaseUrl, $this->language, $this->country, urlencode($keyword), $this->googleApiKey, $start);
		    	    if ($result = file_get_contents($url)) {
		    			$result = json_decode($result);
		    			$rows = array_merge($rows, $result->responseData->results);
		    	    }
		    	}
				
		    	foreach($domains as $url) {
		    		$rankings[$keyword][$url] = '-';
		    		foreach($rows as $position => $row) {
		    			if (strpos($row->url, trim($url)) !== false) {
		    				$rankings[$keyword][$url] = $position+1;
		    				break;
		    			}
		    		}
		    	}
			}   	
		}	

		return $rankings;
	}
	
}
