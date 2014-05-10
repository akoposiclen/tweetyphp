<?php

	if(isset($_POST['password'])){

		$salt = sha1($_POST['password'] . microtime());
		#$salt = "salty-salty-coconut-shell";
		
		$password = sha1($_POST['password']);


		echo "salt - " . $salt . "<br />";
		echo "password - " . $password;
	}

?>

<h1>Hash Gen</h1>


<form method="POST" action="/hash.php">

	<input type="text" name="password" id="password" />
	<input type="submit" value="go" />
</form>