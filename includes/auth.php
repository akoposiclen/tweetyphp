<?php

	ob_start();



	function other_user($id){
		$query = "SELECT * FROM `users` where `id` = $id";		
				$result = mysql_query($query);				
				if(mysql_num_rows($result)){
					$user = mysql_fetch_assoc($result);
					$other_user = $user['fullname'];
					return $other_user;
				}	
	}

	function delete_comment($id){

		$query 		= "SELECT `id` FROM `users` WHERE `id` = " . $_SESSION['user_id'];
		$result 	= mysql_query($query);
		$count = mysql_num_rows($result);
		if($count > 0){


			$query = "DELETE FROM `posts` 
					  WHERE `nID` = $id
					 ";

			mysql_query($query);

			header('Location: ' . $_SERVER['HTTP_REFERER']);


		} else {
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}	
	}


	function post_comment($id, $post){
		


		$count = search_user($id);
		
		if($count == 0){
			header("Location: ../pagenotfound.php");
		} else {		


			$query = "INSERT INTO `posts` 
						(id, post, dDate)
						VALUES
						('$id', '$post', '" . date('Y-m-d H:i:s') . "')
					 ";

			mysql_query($query);

			header('Location: ' . $_SERVER['HTTP_REFERER']);

		}

	}


	function display_users(){
		$query = mysql_query("SELECT `id`, `fullname` FROM `users`");
        $rows = array();
            while($r = mysql_fetch_assoc($query)) {
                $rows[] = $r;
            }
            return json_encode($rows);
	}


	function isfollow($id){
		if($id == $_SESSION['user_id']){
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}

		$query 		= "SELECT `nID` FROM `follow` WHERE `follower` = $id";
		$result 	= mysql_query($query);
		$count = mysql_num_rows($result);
		return $count;
	}


	function display_follower($id){

		$query 		= "SELECT `nID` FROM `follow` WHERE `follower` = $id";
		$result 	= mysql_query($query);
		$count = mysql_num_rows($result);
		return $count;
	}

	function display_following($id){

		$query 		= "SELECT `nID` FROM `follow` WHERE `following` = $id";
		$result 	= mysql_query($query);
		$count = mysql_num_rows($result);
		return $count;
	}


	function display_follower_list($id){

		$query 		= "SELECT `users`.`fullname`, `users`.`id` FROM `follow` 
					   INNER JOIN `users` ON `follow`.`following` = `users`.`id`
					   WHERE `follower` = $id";

		$result 	= mysql_query($query);
		$rows = array();
	        while($r = mysql_fetch_assoc($result)) {
	                $rows[] = $r;
	        }
	        return json_encode($rows);

	}

	function display_following_list($id){

		$query 		= "SELECT `users`.`fullname`, `users`.`id` FROM `follow` 
					   INNER JOIN `users` ON `follow`.`follower` = `users`.`id`
					   WHERE `following` = $id";
		$result 	= mysql_query($query);
		$rows = array();
	        while($r = mysql_fetch_assoc($result)) {
	                $rows[] = $r;
	        }
	        return json_encode($rows);

	}


	function ShowDate($timestamp)
	{
		$stf = 0;
		$cur_time = time();
		$diff = $cur_time - strtotime($timestamp);
		$phrase = array('second','minute','hour','day','week','month','year','decade');
		$length = array(1,60,3600,86400,604800,2630880,31570560,315705600);
		for($i =sizeof($length)-1; ($i >=0)&&(($no = $diff/$length[$i])<=1); $i--); if($i < 0) $i=0; $_time = $cur_time -($diff%$length[$i]);
		$no = floor($no); if($no <> 1) $phrase[$i] .='s'; $value=sprintf("%d %s ",$no,$phrase[$i]);
		if(($stf == 1)&&($i >= 1)&&(($cur_tm-$_time) > 0)) $value .= time_ago($_time);
		return $value.' ago ';
	}

	function search_user($id){


		$query 		= "SELECT `id` FROM `users` WHERE `id` = $id";
		$result 	= mysql_query($query);
		$count = mysql_num_rows($result);
		return $count;

	}

	function display_posts($id){

		$count = search_user($id);
		
		if($count == 0){
			header("Location: ../pagenotfound.php");
		} else {
			

			$query = "SELECT * FROM `posts` INNER JOIN `users`
					  ON `posts`.`id` = `users`.`id` WHERE `posts`.`id`= $id 
					  ORDER BY dDate DESC";
			$result = mysql_query($query);

			$rows = array();
	            while($r = mysql_fetch_assoc($result)) {
	                $rows[] = $r;
	            }
	            return json_encode($rows);
		}
	}


	function count_posts($id){

		$count = search_user($id);
		
		if($count == 0){
			header("Location: ../pagenotfound.php");
		} else {
			

			$query = "SELECT * FROM `posts` INNER JOIN `users`
					  ON `posts`.`id` = `users`.`id` WHERE `posts`.`id`= $id";
			$result = mysql_query($query);
			return mysql_num_rows($result);

		}
	}


	function display_microposts($id){
		$count = search_user($id);
		
		if($count == 0){
			header("Location: ../pagenotfound.php");
		} else {
			

			$query = "SELECT 
							`posts`.`nID`, 
							`posts`.`id`, 
							`users`.`fullname`, 
							`posts`.`dDate`,
							`posts`.`post`
					  FROM `posts`
					  INNER JOIN `users` ON `posts`.`id` = `users`.`id`
					  WHERE (`posts`.`id` IN
					  		(
					  			SELECT `follower` FROM `follow`
					  			WHERE (`following` = $id)
					  		)
					  	) OR (`posts`.`id` = $id) ORDER BY dDate DESC
			";
			$result = mysql_query($query);

			$rows = array();
	            while($r = mysql_fetch_assoc($result)) {
	                $rows[] = $r;
	            }
	            return json_encode($rows);
		}
	}


	function credentials_valid($username, $password){



		$username	= mysql_real_escape_string($username);
		$query		= "SELECT `id`, `salt`, `password`
						FROM `users` WHERE `username` = '$username'";

		$result 	= mysql_query($query);
		
		if(mysql_num_rows($result)){
			$user 				= mysql_fetch_assoc($result);			
			$password_requested	= sha1($password);			
			if($password_requested === $user['password']){				
				return $user['id'];                      
			}
		}

	}


	function signup_valid($username, $fullname, $password, $repassword){


		if($username && $fullname && $password && $repassword){
			header("Location: signup.php?error=1");
		}

		if($password != $repassword){
			header("Location: signup.php?error=2");
		}


		$username	= mysql_real_escape_string($username);

		$query 		= "SELECT `id` FROM `users` WHERE `username` = '$username'";
		$result 	= mysql_query($query);
		$count = mysql_num_rows($result);
		if($count > 0){
			header("Location: signup.php?error=3");
		} else {
			$password = sha1($password);	
			$salt = sha1(microtime());		
			$query = "INSERT INTO `users` 
						(fullname, username, password, salt)
						VALUES
						('$fullname', '$username', '$password', '$salt')
					 ";

			mysql_query($query);

			
			$user_id = credentials_valid($username, $repassword);
			if($user_id){			
				log_in($user_id);
				header("Location: index.php");
				
			} else {
				header("Location: login.php?error=1");
				exit("Page redirected");
			}


		}
	}


	function log_in($user_id){		
		$_SESSION['user_id'] = $user_id;
	}

	function current_user(){
		static $current_user;
		if(!$current_user){
			if(isset($_SESSION['user_id'])){

				$user_id = intval($_SESSION['user_id']);	

				$query = "SELECT * FROM `users` where `id` = $user_id";		
				$result = mysql_query($query);				
				if(mysql_num_rows($result)){
					$user = mysql_fetch_assoc($result);
					$current_user = $user['fullname'];
					return $current_user;
				}				
			}
			
				
		}		
		return $current_user;
	}




?>