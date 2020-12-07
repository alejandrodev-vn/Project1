<!DOCTYPE html>
<html>
    <body>
        <div>
            <div>TÀI KHOẢN</div>
<div>
                <div>
                    xin chào:
                    <?= $_SESSION['username']['fullName']?>
                </div>
                <!-- <li><a href="?act=login&logout" onclick="tai_lai_trang()">Đăng xuất</a></li> -->
                <li><a href="?act=logout">Đăng xuất</a></li>
                <li><a href="doi-mk.php">Đổi mật khẩu</a></li>
                <li><a href="cap-nhat-tk.php">Cập nhật tài khoản</a></li>
                
                <?php
                
                    if($_SESSION['username']['idRole'] == 1){
                        echo "<li><a href='../dashboard'>quản lí</a></li>";
                    }
                ?>
            </div>
        </div>        
    </body>
</html>