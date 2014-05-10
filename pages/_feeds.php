
    <div class="large-8 columns">    
        <div class="panel">
            <h4><?php echo $title; ?></h4>
            <hr />


            

            <?php 

                if(isset($_GET['id'])){

                    $result = json_decode(display_posts($_GET['id']), true);

                    

                    foreach($result as $item){
                        $fullname   = $item['fullname'];
                        $nID         = $item['nID'];
                        $id         = $item['id'];
                        $post       = $item['post'];
                        $dDate      = $item['dDate'];
                        #$dDate      = time_ago($dDate);
                        $dDate      = ShowDate($dDate);

                        echo 
                        "
  
                            <div class='content'>
                                <div class='avatar'>
                                    <img src='https://fbcdn-profile-a.akamaihd.net/hprofile-ak-frc1/t1.0-1/c178.0.604.604/s160x160/252231_1002029915278_1941483569_n.jpg' height='50' width='50' /> 
                                    <a href='profile.php?id=$id'>$fullname</a>                               
                                </div>
                                <div class='post'>
                                    $post
                                </div>
                                <div class='post'>
                                    $dDate
                                </div>

                        ";
                        if($id == $_SESSION['user_id']) {
                            echo "
                                    <div class='delete'>
                                        <a href='delete.php?id=$nID'>delete</a>
                                    </div>
                            ";
                        }

                        echo "

                                    <hr /> 
                                </div>
                        ";
                    }

                    

                } else {



                    $result = json_decode(display_microposts($_SESSION['user_id']), true);

                    


                    foreach($result as $item){
                        $fullname   = $item['fullname'];
                        $nID         = $item['nID'];
                        $id         = $item['id'];
                        $post       = $item['post'];
                        $dDate      = $item['dDate'];
                        #$dDate      = time_ago($dDate);
                        $dDate      = ShowDate($dDate);

                        echo 
                        "
  
                            <div class='content'>
                                <div class='avatar'>
                                    <img src='https://fbcdn-profile-a.akamaihd.net/hprofile-ak-frc1/t1.0-1/c178.0.604.604/s160x160/252231_1002029915278_1941483569_n.jpg' height='50' width='50' /> 
                                    <a href='profile.php?id=$id'>$fullname</a>                               
                                </div>
                                <div class='post'>
                                    $post
                                </div>
                                <div class='post'>
                                    $dDate
                                </div>

                        ";



                        if($id == $_SESSION['user_id']) {
                            echo "
                                    <div class='delete'>
                                        <a href='delete.php?id=$nID'>delete</a>
                                    </div>
                            ";
                        }

                        echo "

                                    <hr /> 
                                </div>
                        ";
                    }


                }

            ?>
        </div>
    </div>