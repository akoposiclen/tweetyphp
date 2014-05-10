<div class="large-4 columns">        
        <div>

            <div class="panel">
            
                <div class="baner this-to-center">

                    <img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-frc1/t1.0-1/c178.0.604.604/s160x160/252231_1002029915278_1941483569_n.jpg" /><br /><br /><br />
                    <?php

                        if(isset($_GET['id'])){
                            echo "<a href='profile.php?id=" . $_GET['id'] . "''>" . other_user($_GET['id']) . "</a>";
                        } else {
                            echo "<a href='profile.php?id=" . $_SESSION['user_id'] . "''>" . current_user() . "</a>"; 
                        }  

                      ?>

                </div>

                <div class="spacer"></div>

                <hr />
                <div class="tweety">
                    <?php 
                        if(isset($_GET['id'])){
                            echo count_posts($_GET['id']) . " Tweety";
                        } else {
                            echo count_posts($_SESSION['user_id']) . " Tweety";
                        }  
                    ?>
                </div>
                <hr />

                <div class="followers">
                    <?php 
                        if(isset($_GET['id'])){
                            echo "<a href='follower.php?id=" . $_GET['id'] . "'>". display_follower($_GET['id']) . " Follower</a>";
                        } else {
                            echo "<a href='follower.php?id=" . $_SESSION['user_id'] . "'>". display_follower($_SESSION['user_id']) . " Follower</a>";
                        }  
                    ?>
                </div>
                <hr />

                <div class="following">
                    <?php 
                        if(isset($_GET['id'])){
                            echo "<a href='following.php?id=" . $_GET['id'] . "'>" . display_following($_GET['id']) . " Following</a>";
                        } else {
                            echo "<a href='following.php?id=" . $_SESSION['user_id'] . "'>" . display_following($_SESSION['user_id']) . " Following</a>";
                        }  
                    ?>
                </div>
                <hr />

                <div class="spacer"></div>


                <?php if(isset($_GET['id'])): ?>

                    <?php if($_GET['id'] == $_SESSION['user_id']): ?>


                        <form method="POST" action="submit_post">
                            <label>
                            <textarea name="comment" ></textarea>
                            <input type="submit" class="button secondary expand" value="Post" />
                        </form>

                    <?php else: ?>


                        <?php $count = isfollow($_GET['id']); ?>

                            <?php if($count == 0): ?>
                                <a  <?php echo "href='includes/follow.php?id=" .  $_GET['id'] . "'"; ?> class="button secondary expand">Follow</a>

                            <?php else: ?>
                                <a  <?php echo "href='includes/unfollow.php?id=" .  $_GET['id'] . "'"; ?> class="button secondary expand">Unfollow</a>

                            <?php endif; ?>

                    <?php endif; ?>

                <?php else: ?>


                    <form method="POST" action="submit_post">
                        <label>
                        <textarea name="comment" ></textarea>
                        <input type="submit" class="button secondary expand" value="Post" />
                    </form>

                <?php endif; ?>

            </div>

        </div>
    </div>