
<?php 
    include "pages/_headscripts.php"; 

    if(!current_user()){
        header("Location: login.php?required=1");
    }


?>


<div class="panel">
    <div class="row">

        <div class="spacer hide-for-small"></div>
        <div class="spacer"></div>
        <form id="formPost" action="authenticate.php" method="post">


            <div class="large-12 columns">
                <h4 class="this-to-center">Users</h4>
            </div>
            <div class="spacer"></div>
            <div class="spacer"></div>
            <div class="row">
                <?php
                    $users_list = json_decode(display_users(), true);
                    

                    foreach($users_list as $item){
                        $fullname   = $item['fullname'];
                        $id         = $item['id'];
                        echo 
                        "
                          <div class='content'>                            
                                <div class='users'>
                                    <a href='profile.php?id=" . $id . "'>
                        "           
                                            . $fullname . 
                        
                        "
                                    </a>
                                </div>
                                
                                <hr /> 
                            </div>
                        ";
                    }

                ?>
            </div>



        </form>

    </div>


</div>

<?php include "pages/_footscripts.php" ?>