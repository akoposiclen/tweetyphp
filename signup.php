
<?php 
    include "pages/_headscripts.php";

   if(current_user()){
        header("Location: index.php");
    }


    if($_POST){
        $signup = signup_valid(
                               $_POST['username'], 
                               $_POST['fullname'], 
                               $_POST['password'], 
                               $_POST['repassword']
                               );        
    }

?>



<div class="panel">
    <div class="row">

        <div class="spacer hide-for-small"></div>
        <div class="spacer"></div>
        <form id="formPost" action="/signup.php" method="post">


            <div class="large-4 columns">
                <h4>Sign up</h4>
            </div>


            <hr />
            <div class="row" >
                <div class="large-4 columns"><label></label></div>
                <div class="large-4 columns">
                    <center>
                        <span id="messages">                            
                            <?php 

                                if(isset($_GET['error'])){

                                    if($_GET['error'] == 1){
                                        echo "Please fill up the form";
                                    } else if($_GET['error'] == 2){
                                        echo "Password does not match";
                                    } else if($_GET['error'] == 3){
                                        echo "User already exist";
                                    } else {
                                        header("Location: signup.php");
                                    }

                                }

                             ?>
                        </span>
                    </center>
                </div>
                <div class="large-4 columns"><label></label></div>
                <div class="spacer" ></div>
            </div>


            <div class="row">
                <div class="large-4 columns"><label></label></div>
                <div class="large-4 columns">
                    <label>Full name</label>
                    <input name="fullname" id="fullname" type="text" placeholder="Name" />
                </div>
                <div class="large-4 columns"><label></label></div>
            </div>

            
            <div class="row">
                <div class="large-4 columns"><label></label></div>
                <div class="large-4 columns">
                    <label>Username</label>
                    <input name="username" id="username" type="text" placeholder="Username" />
                </div>
                <div class="large-4 columns"><label></label></div>
            </div>


            <div class="row">
                <div class="large-4 columns"><label></label></div>
                <div class="large-4 columns">
                    <label>Password</label>
                    <input name="password" id="password" type="password" placeholder="Password" />
                </div>
                <div class="large-4 columns"><label></label></div>
            </div>

            <div class="row">
                <div class="large-4 columns"><label></label></div>
                <div class="large-4 columns">
                    <label>Confirm Password</label>
                    <input name="repassword" id="repassword" type="password" placeholder="Confirm Password" />
                </div>
                <div class="large-4 columns"><label></label></div>
            </div>

            <div class="row">
                <div class="large-4 columns"><label></label></div>
                <div class="large-4 columns">
                    <center><button class="small button secondary expand" id="signup" >Sign up</a></center>
                </div>
                <div class="large-4 columns"><label></label></div>
            </div>


            <hr />

        </form>

    </div>


</div>


<?php include "pages/_footscripts.php" ?>