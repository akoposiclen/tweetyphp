
<?php 
    include "pages/_headscripts.php"; 

    if(current_user()){
        header("Location: index.php");
    }


?>


<div class="panel">
    <div class="row">

        <div class="spacer hide-for-small"></div>
        <div class="spacer"></div>
        <form id="formPost" action="authenticate.php" method="post">


            <div class="large-4 columns">
                <h4>Login user</h4>
            </div>


            <hr />
            <div class="row" >
                <div class="large-4 columns"><label></label></div>
                <div class="large-4 columns">
                    <center>
                        <label class="messages">                            
                            <?php if(isset($_GET['error']) == '1'): ?>
                                Username or password is invalid
                            <?php endif; ?>
                            <?php if(isset($_GET['required']) == '1'): ?>
                                You must login first!
                            <?php endif; ?>
                        </label>
                    </center>
                </div>
                <div class="large-4 columns"><label></label></div>
                <div class="spacer" ></div>
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
                    <center><button class="small button secondary expand" id="login" >Login</a></center>
                </div>
                <div class="large-4 columns"><label></label></div>
            </div>


            <hr />

        </form>

    </div>


</div>

<?php include "pages/_footscripts.php" ?>