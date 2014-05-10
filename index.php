
<?php include "pages/_headscripts.php"; ?>


<?php if(current_user()): ?>


    <?php 

        $title = "What's Happening";

        include "pages/_sidebar.php"; 
        include "pages/_feeds.php"; 
    ?>    



<?php else: ?>

    

        <div class="row">
            <br /><br /><br /><br /><br /><br /><br />
            <div class="spacer hide-for-small"></div>

            <div class="large-3 columns"><label></label></div>
            <div class="large-6 columns">
                <h1>
                    <center>
                        Welcome to tweety                
                    </center>                
                </h1>
                <center>
                        <a href="/login.php" class="button secondary small">Sign in!</a>
                        <a href="/signup.php" class="button secondary small">Sign up!</a>
                </center>       
                <br /><br /><br /><br /><br /><br /><br />                   
            </div>
            <div class="large-3 columns"><label></label></div>
            <br /><br /><br /><br /><br /><br /><br />

        </div>



<? endif; ?>


<?php include "pages/_footscripts.php" ?>