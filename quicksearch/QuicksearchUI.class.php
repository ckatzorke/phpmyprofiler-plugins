<?php
/**
 * UI class for the quicksearch.
 *
 */
class QuicksearchUI {
	
	//id of the inputfield
	var $searchFieldId = "dvdquicksearch";
	//how many characters to enter before search is triggered. In large collections (>1000) use at least 2 or 3, default = 1
	var $minChars = 1;
	//the width of the result scrollpanel
	var $resultWidth = 370;
	//the height of the searchresult scrollpanel
	var $scrollHeight = 400;
	//TODO weitere felder
	
	
	/**
	 * Constructor for Quicksearch widget
	 * @return instance of QuickseachUI
	 */
	function QuicksearchUI(){
		//
	}
	
	function jsHeader(){
		echo "<script type=\"text/javascript\" src=\"../js/jquery-1.3.2.js\"></script>
<script type=\"text/javascript\" src=\"../js/jquery.json-2.2.js\"></script> 
<script type=\"text/javascript\" src=\"../js/jquery.autocomplete.js\"></script>
<script type=\"text/javascript\" src=\"../js/dvd.js\"></script>\n";
	}
	
	function cssHeader(){
		echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../js/jquery.autocomplete.css\">\n";
	}
	
	function createWidget(){
		echo "<script type=\"text/javascript\">
<!-- 
\$(document).ready(function(){
  	\$(\"#$this->searchFieldId\").autocomplete(\"searchhandler.php\",  {
  		width: $this->resultWidth,
		highlight: false,
		scroll: true,
		scrollHeight: $this->scrollHeight,
  	  	minChars: $this->minChars,
  	    formatItem: function(item, i, n, value) {
	  	    var searchresult = getDVDFromJSON(item[0]);
	  		return getDVDDetailsPanel(searchresult); 
  	    },
  	    formatResult: function(item){
  	    	var searchresult = getDVDFromJSON(item[0]);
			return searchresult.title;
  	    }
	 }).result(function(event, item) {
		 var searchresult = getDVDFromJSON(item[0]);
		 location.href = config.pmpRelativePath + \"/index.php?content=filmprofile&id=\" + searchresult.id;
	 });
  });
-->
</script>
<input type=\"text\" id=\"$this->searchFieldId\" width=\"500px\" title=\"Quicksearch\"/>\n";
	}
}
?>