<?php 

	/*
	Функции и определения
	*/

	// mysql accuont data
	$DBuser = 'root';
	$DBhost = 'localhost';
	$DBpasswd = '';
	$Dbase = 'konstantin_a_gorodilov_bd';

	@mysql_connect($DBhost, $DBuser, $DBpasswd) or DIE('Unable to connect to MYSQL server '.$sHost.' <br> Reason: '.mysql_error());
	mysql_select_db($Dbase) or DIE('unable to select database '.$sdb);

	mysql_set_charset("utf8"); // fix encoding collapse // костыль работает


?>