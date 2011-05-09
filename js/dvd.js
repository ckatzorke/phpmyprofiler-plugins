/*
 * load config as JSON object. Config contains the relative path to pmp, so the url to the thumbnail etc can be created.
 */
var config;
$.getJSON("confighandler.php", function(json){
  config = json;
});

/**
 * Passing a jsonstring, this function parses the jsonstring and returns the parsed object
 * @param jsonString
 * @return
 */
function getDVDFromJSON(jsonString){
	return $.evalJSON(jsonString);
}

/**
 * Creates an html panel (compareable with the details view in the
 * dvdprofiler)
 * 
 * @param dvd
 *            the passed dvd object
 * @return
 */
function getDVDDetailsPanel(dvd) {
	var panel = "<div style='color: grey; font-size: x-small; margin: 2px; width: 70px; height: 80px; text-align: center; vertical-align:middle; float: left'>"
			+ "<img style='' src='" + config.pmpRelativePath + "/thumbnail.php?id="
			+ dvd.id
			+ "&type=front&width=60'/></div>"
			+ "<div style='float:left; margin: 2px; text-align:left; vertical-align: top; width: 260px;'>" 
			+ "<span style='float:left; width: 230px; overflow: hidden; text-overflow: ellipsis''>"
			+ dvd.title
			+ "</span><span style='float: right; width: 30px;'>#"
			+ dvd.collectionnumber + "</span></div>"
	return panel;
}
