<<<<<<< HEAD
<div id="edit_user" class="box-content">
    <h5 style = "color: black;">Xin chào "<?= $_SESSION['username']['fullName'] ?>". Bạn đang thay đổi mật khẩu</h5>
    <form action="index.php?act=change_pass" method="Post" autocomplete="off">
        <input type="hidden" name="idUser" value="<?= $_SESSION['username']['idUser'] ?>">
        <label>Password cũ</label></br>
        <input type="password" name="old_password" value="" /></br>
        <label>Password mới</label></br>
        <input type="password" name="new_password" value="" /></br>
        <label>Xác nhận password</label></br>
        <input type="password" name="passwordcf" value="" /></br>
        <br><br>
        <input name="change_pass" type="submit" value="Edit" />
    </form>
</div>
            


=======
<?php
if(isset($_SESSION['username'])){
    ?>
    <div class="container">
            <div id="edit_user" class="box-content change-password__wrapper">
                            <h5 style = "color: black;">Change password for: <?= $_SESSION['username']['username'] ?></h5>
                            <form action="index.php?act=change_pass" method="Post" autocomplete="off">
                                <div class="form-group">
                                    <input type="hidden" name="idUser" value="<?= $_SESSION['username']['idUser'] ?>">
                                    <label>Old Password </label></br>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="old_password" class="form-control" value="" /></br>
                                    <label>New Password </label></br>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="new_password" class="form-control" value="" /></br>
                                    <label>Cofirm New Password</label></br>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="passwordcf" class="form-control" value="" /></br>
                                    </div>
                             
                                <input name="change_pass" class="submit_btn" type="submit" value="Change" />
                            </form>
            </div>
    </div>
                <?php
>>>>>>> d289dd87a474f981c457516ece2913b4a63aeb89


