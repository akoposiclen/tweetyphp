<?php 
	session_start();
	include "includes/database.php";
	connect_to_db();
	require_once "includes/auth.php";

?>


<!DOCTYPE html>
<html>
<head>
<title>Tweety</title>
<!--[if lt IE 7]><html class="lt-ie9 lt-ie8 lt-ie7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><![endif]-->
<!--[if IE 7]><html class="lt-ie9 lt-ie8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><![endif]-->
<!--[if IE 8]><html class="lt-ie9" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]-->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta http-equiv="x-ua-compatible" content="IE=9">
<link rel='stylesheet' href='/stylesheets/style.css' />
<link rel="stylesheet" href='stylesheets/foundation.css'>
<link rel="stylesheet" href='stylesheets/foundation/min.css'>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script src='js/vendor/custom.modernizr.js'></script>
<script src="js/jquery-scrolltofixed-min.js" type="text/javascript"></script>


<script src="js/foundation/foundation.abide.js"></script>

<script src="js/foundation/foundation-datepicker.js"></script>
<script src="js/scripts.js"></script>
<link rel="stylesheet" href="stylesheets/foundation-datepicker.css">



<script src="js/global.js" type="text/javascript"></script>

</head>
<body>





<nav class="top-bar">
    <ul class="title-area">
        <!-- Title Area -->
        <li class="show-for-medium-up  name">
        </li>

        <li class="hide-for-medium-up  name">
        </li>

        <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>MENU</span></a></li>
    </ul>

    <section class="top-bar-section">
        <!-- Left Nav Section -->
        <ul class="left">


			<li class="divider hide-for-small"></li>
            <li class="hide-for-small">
                <a href="/index.php">
                    tweety
                </a>
            </li>

        </ul>

        <!-- Right Nav Section -->

        <ul class="right">

        <li class="divider hide-for-small"></li>


	        <?php if(current_user()): ?>

	   
				<li class="divider hide-for-small"></li>
	            <li>
	            	
	            	<a href=<?php echo "profile.php?id=" .  $_SESSION['user_id']; ?> ><?php echo current_user(); ?></a>  
	            </li>

				<li class="divider hide-for-small"></li>

     
	            <li class="has-dropdown">
	                 <a href="#">
	                    <?php echo " &nbsp; "; ?>
	                </a>
	                <ul class="dropdown">

	                	<li>
			                <a href="/users.php">
			                    Users list
			                </a>
			            </li>
			             <li class="divider hide-for-small"></li>
	                    <li>
	                        <a href=<?php echo "profile.php?id=" .  $_SESSION['user_id']; ?> >Profile</a>                      
	                    </li>
	                    <li class="divider hide-for-small"></li>
	                    <li>
	                        <a href="logout.php" class="">Sign out</a>                      
	                    </li>                                        
	                        
	                        
	                </ul>
	            </li>


	        <?php else: ?>

	            <li>
	                <a href="/login.php">
	                    Sign in
	                </a>
	            </li>
	            <li class="divider hide-for-small"></li>
	            
	            <li>
	                <a href="/signup.php">
	                    Sign up
	                </a>
	            </li>
	            

	        <?php endif; ?>


        </ul>
    </section>
</nav>
