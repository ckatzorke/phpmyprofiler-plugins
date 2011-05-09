<?php
/*
 * SearchService.class
 * Provides search funtions for PHPMyProfiler DB
 */
require_once('Config.class.php');
$config = new Config();
//use config and db functions from pmp
require_once($config->pmpRelativePath . '/config.inc.php');
require_once($config->pmpRelativePath . '/include/functions.php');
//also use the existing class(es) from pmp
require_once($config->pmpRelativePath . '/include/smallDVD.class.php');
require_once('SearchResult.class.php');
class SearchService {
	/*
	 * Performs a title based search, limits the searchresults to 200.
	 * @param query the querystring
	 * @return an array of SearchResult
	 */
	static function doTitleSearch($query){
		return SearchService::doTitleSearchLimit($query, 200);
	}
	
	/*
	 * Performs a title based search
	 * @param query the querystring
	 * @param limit the limitation
	 * @return an array of DVDs
	 */
	static function doTitleSearchLimit($query, $limit){
		dbconnect();
		$sql = 'SELECT id FROM pmp_film WHERE title like \'%' . mysql_real_escape_string($query) . '%\'';
		$resultset = dbexec($sql);
		$searchresult = array();
		if ( @mysql_num_rows($resultset) > 0 ){
			while ( $row = mysql_fetch_object($resultset) ) {
				$dvd= new smallDVD($row->id);
				$result = new SearchResult($dvd);
				array_push($searchresult, $result);
			}
		}
		return $searchresult;
	}
	
	
	
	
}

?>