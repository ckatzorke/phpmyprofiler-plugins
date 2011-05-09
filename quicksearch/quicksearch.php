<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Search Suggest</title>
<?php
require_once('QuicksearchUI.class.php');
$quicksearch = new QuicksearchUI();
$quicksearch->minChars = 2;
$quicksearch->jsHeader();
$quicksearch->cssHeader();
?>
</head>
<body>
<form autocomplete="off">
	<p>
		<label>Sample Quicksearch:</label>
		<?php $quicksearch->createWidget();?>
	</p>
</form>	
</body>
</html>