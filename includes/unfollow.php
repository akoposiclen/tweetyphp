<?php
	session_start();
	include "database.php";
	connect_to_db();
	require_once "auth.php";



	function unfollow_user($id){


		$count = unfollow_exist($id);

		if($count == 0){

			header("Location: ../pagenotfound.php");

		}else{
			
			$query = "DELETE FROM `follow` 
					WHERE `follower` = $id";

			mysql_query($query);

			header('Location: ' . $_SERVER['HTTP_REFERER']);

		}


	}


	function unfollow_exist($id){
		$query 		= "SELECT `nID` FROM `follow` WHERE `follower` = $id";
		$result 	= mysql_query($query);
		$count = mysql_num_rows($result);
		return $count;
	}


	if(current_user()){

		if(isset($_GET['id'])){
			echo unfollow_user($_GET['id']);
		}

	}
	

?>