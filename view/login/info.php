    <style>
        .profile__wrapper{
            width:50%;
            margin:0 auto;
        }
    </style>
        <div class="container profile__wrapper">
            <div class="row">
            <div class="col-lg-12" ><h3>Profile: </h3> </div>
<div>
                <div>
                
                    <?= $_SESSION['username']['fullName']?>
                </div>
                <!-- <li><a href="?act=login&logout" onclick="tai_lai_trang()">Đăng xuất</a></li> -->
                <li><a href="?act=logout">Đăng xuất</a></li>
                <li><a href="doi-mk.php">Đổi mật khẩu</a></li>
                <li><a href="cap-nhat-tk.php">Cập nhật tài khoản</a></li>
                
                <?php
                
                    if(($_SESSION['username']['idRole'] == 1) || ($_SESSION['username']['idRole'] == 2)) {
                        echo "<li><a href='../dashboard'>quản lí</a></li>";
                    }
                ?>
            </div>
            </div>
        </div>        
