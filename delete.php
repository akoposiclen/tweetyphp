<?php

	session_start();
	include "includes/database.php";
	connect_to_db();
	require_once "includes/auth.php";


	if($_GET){
		
		delete_comment($_GET['id']);	

	}


?>