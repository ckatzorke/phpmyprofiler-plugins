<?php
/**
 * Performs the search.
 * Is called from search.html with parameter q and limit (and possible others from jquery autocomplete).
 * Performs the title based search and prints the results as pipe seperated strings (jquery autocomplete automatically parses pipes seperated strings as js arrays).
 * 
 */
$pmp_rel_path = "..";
$q = strtolower($_GET["q"]);
if (!$q) return;
$limit = intval($_GET["limit"]);
/*
 * Include the SearchResult class as well as phpmyprofiler includes
 */
require('SearchService.class.php');
//header('Content-type: application/json; charset=utf-8');
$searchresult = SearchService::doTitleSearchLimit($q, $limit);
foreach ($searchresult as $result){
	echo json_encode($result) , "\n";
}
?>