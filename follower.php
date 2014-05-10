
<?php 
    include "pages/_headscripts.php"; 

    if(!current_user()){
        header("Location: login.php?required=1");
    }


    $title = "Follower";
    include "pages/_sidebar.php"; 
    include "pages/_follow.php"; 

?>





<?php include "pages/_footscripts.php" ?>