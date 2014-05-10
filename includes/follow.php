<?php
	session_start();
	include "database.php";
	connect_to_db();
	require_once "auth.php";



	function follow_user($id){


		$count = follow_exist($id);

		if($count == 0){

			$query = "INSERT INTO `follow` 
						(follower, following)
						VALUES
						('$id', '" . $_SESSION['user_id'] . "')
					 ";

			mysql_query($query);

			header('Location: ' . $_SERVER['HTTP_REFERER']);

		}else{
			header("Location: ../pagenotfound.php");
		}


	}


	function follow_exist($id){
		$query 		= "SELECT `nID` FROM `follow` WHERE `follower` = $id";
		$result 	= mysql_query($query);
		$count = mysql_num_rows($result);
		return $count;
	}


	if(current_user()){

		if(isset($_GET['id'])){
			echo follow_user($_GET['id']);
		}

	}
	

?>