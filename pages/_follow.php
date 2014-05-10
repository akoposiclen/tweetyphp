
    <div class="large-8 columns">    
        <div class="panel">
            <h4><?php echo $title; ?></h4>
            <hr />


            

            <?php 

                if(isset($_GET['id'])){

                    if($title == "Follower"){
                        $result = json_decode(display_follower_list($_GET['id']), true); 
                    } else {
                        $result = json_decode(display_following_list($_GET['id']), true); 
                    }


                    foreach($result as $item){
                        $fullname   = $item['fullname'];
                        $id         = $item['id'];

                        echo 
                        "

                            <div class='content'>
                                <div class='avatar'>
                                    <img src='https://fbcdn-profile-a.akamaihd.net/hprofile-ak-frc1/t1.0-1/c178.0.604.604/s160x160/252231_1002029915278_1941483569_n.jpg' height='50' width='50' /> 
                                    <a href='profile.php?id=$id'>$fullname</a>                               
                                </div>

                        ";

                        echo "

                                    <hr /> 
                                </div>
                        ";
                    }

                    

                } 


            ?>
        </div>
    </div>