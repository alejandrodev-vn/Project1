<div id="edit_user" class="box-content">
    <h5> Bạn đang thay đổi thông tin </h5>
    <form action="index.php?act=change_info" method="Post" autocomplete="off">
        <input type="hidden" name="idUser" value="<?= $_SESSION['username']['idUser'] ?>">
        <label>Full Name</label></br>
        <input type="text" name="fullName" value="<?=$_SESSION['username']['fullName']?>" /></br>
        <label>Phone Number</label></br>
        <input type="text" name="phoneNumber" value="<?=$_SESSION['username']['phoneNumber']?>" /></br>
        <label>Address</label></br>
        <input type="text" name="address" value="<?=$_SESSION['username']['address']?>" /></br>
        <br><br>
        <input name="change_info" type="submit" value="Edit" />
    </form>
</div>
