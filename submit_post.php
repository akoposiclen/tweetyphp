<?php

	session_start();
	include "includes/database.php";
	connect_to_db();
	require_once "includes/auth.php";


	if($_POST){
		
		post_comment($_SESSION['user_id'], $_POST['comment']);		

	}



?>