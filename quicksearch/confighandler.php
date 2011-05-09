<?php
//remote php file that prints out the config as JSON object, so it can be read and parsed from JS via ajax
require_once('Config.class.php');
$config = new Config();
echo json_encode($config)
?>