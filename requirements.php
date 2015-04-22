<?php

	error_reporting(E_ALL^E_NOTICE^E_DEPRECATED);
	session_start();
	
	require_once("required/config.php");
	
	mysql_connect (DB_HOST, DB_USER, DB_PASS) or die();
	mysql_select_db (DB_NAME) or die();
	
	require_once("required/functions.php");
	require_once("required/functions_db.php");
	