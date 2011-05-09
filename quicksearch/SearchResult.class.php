<?php
class SearchResult {
	
	function SearchResult($dvd){
		$this->id = $dvd->id;
		$this->title = $dvd->title;
		$this->collectionnumber = $dvd->collectionnumber;
	}
	
}
?>