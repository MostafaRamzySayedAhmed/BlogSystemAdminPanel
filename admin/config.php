<?php

// The Connection Parameters

    $dsn = 'mysql:host=localhost;dbname=blog';
	$user = 'root';
	$pass = '';
	$option = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	);

// Creating The Connection

	try 
    {
		$conn = new PDO($dsn, $user, $pass, $option);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	catch(PDOException $e) 
    {
		echo 'Failed To Connect' . $e->getMessage();
	}