<?php

	session_start();
	include "includes/database.php";
	connect_to_db();
	require_once "includes/auth.php";


	if($_POST){
		
		$user_id = credentials_valid($_POST['username'], $_POST['password']);
		if($user_id){			
			log_in($user_id);
			header("Location: index.php");
			
		} else {
			header("Location: login.php?error=1");
			exit("Page redirected");
		}


	}


?>
