<?php
// dump($_SERVER);
// $_SERVER - information about the server
// $_GET - from url, the query string
// $_POST - data passed from form
// $_COOKIE - save user info
// $_SESSION - pass info through pages
// $_FILES - use when upload files
include_once('vendor/adodb5/adodb.inc.php');
require_once('vendor/adodb5/adodb-active-record.inc.php');

function connect($username = 'root', $password = '', $host = '127.0.0.1', $db = NULL, $driver = NULL, $port = 5432) {
	$driver = empty($driver) ? 'mysqli':$driver; 
		
	$database = ADONewConnection($driver); # create a connection
	$database->NConnect($host, $username, $password, $db);# connect to MySQL
	$database->Execute("SET NAMES 'utf8'");
	
	return $database;
}

function message($mesasge, $error = false) {
	if($error) {
		echo Html::tag('div',$mesasge,array('class' => 'alert alert-danger'));
	} else {
		echo Html::tag('div',$mesasge,array('class' => 'alert alert-success'));
	}
}	

function dump($value) {
	print "<pre>";
	print_r($value);
	print "</pre>";
}

function clean_query_string($value) {
	$data = trim($value); // remove spaces at the beginning and end of the string
	$data = stripslashes($data); // remove slashes
	$data = htmlspecialchars($data); // 
	return $data;
}

function encode_url($value) {
	return htmlspecialchars($value);
}

function safe_post_data() {
	if ($_SERVER["REQUEST_METHOD"] == "POST") { 
		foreach ($_POST as $key => $value) {
			if(is_string($value)) {
				$_POST[$key] = clean_query_string($_POST[$key]);
			}
		}
	}
}

?>