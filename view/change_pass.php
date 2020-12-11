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
            




