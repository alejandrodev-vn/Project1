
        <div class="container profile__wrapper pt-70">
            <div class="row">
            <div class="col-lg-12" ><h3>Profile: <?= $_SESSION['username']['fullName']?> </h3> </div>
            <ul>    
                <li><a href="index.php?act=change_info"><i class="fas fa-user"></i> Edit Profile</a></li>
                <li><a href="index.php?act=change_pass"><i class="fas fa-key"></i> Change password</a></li>
                <?php
                
                    if(($_SESSION['username']['idRole'] == 1) || ($_SESSION['username']['idRole'] == 2)|| ($_SESSION['username']['idRole'] == 3)) {
                        echo '<li><a href="../dashboard"><i class="fas fa-tasks"></i>Dashboard</a></li>';
                    }
                ?>
                <li><a href="?act=logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
            </div>
        </div>        
