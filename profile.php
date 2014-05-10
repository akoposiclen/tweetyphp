
<?php 
    include "pages/_headscripts.php";

    if(!isset($_GET['id'])){
        header("Location: pagenotfound.php");
    }

?>



<?php if(current_user()): ?>
    

  
    <?php 

        $title = "Tweety";
        include "pages/_sidebar.php"; 
        include "pages/_feeds.php"; 
    ?>    



<?php else: ?>

    <div class="spacer"></div>
    <div class="spacer"></div>
    <div class="spacer"></div>
    <div class="spacer"></div>
    <h1 class="this-to-center">
        You must Sign in to view this page
        <div class="spacer"></div>
        <a href="login.php">Sign in</a>
    </h1>

<?php endif; ?>


<?php include "pages/_footscripts.php" ?>