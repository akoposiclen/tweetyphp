<?php

	
	function connect_to_db() {
			$host		= "localhost";
		$username	= "root";
		$password 	= "root";
		$database	= "tweety";


		$link = mysql_connect($host, $username, $password);
		if(!$link) {
			exit('Could not connect to database: ' . mysql_error());
		}



		$selected = mysql_select_db($database);

		if(!$selected){
			exit("could not select database '$database'");
		}	
	}


?>