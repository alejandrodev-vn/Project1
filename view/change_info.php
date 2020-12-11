<div id="edit_user" class="box-content profile__wrapper">
    <h3> Edit your profile </h3>
    <form action="index.php?act=change_info" method="Post" autocomplete="off">
        <div class="form-group">
            <input type="hidden" name="idUser" value="<?= $_SESSION['username']['idUser'] ?>">
            <label>Full Name:</label></br>
        </div>
        <div class="form-group">
            <input type="text" name="fullName" class="form-control" value="<?=$_SESSION['username']['fullName']?>" /></br>
            <label>Phone Number:</label></br>
        </div>
        <div class="form-group">
            <input type="text" name="phoneNumber" class="form-control"  value="<?=$_SESSION['username']['phoneNumber']?>" /></br>
            <label>Address:</label></br>
        </div>
            <input type="text" name="address" class="form-control"  value="<?=$_SESSION['username']['address']?>" /></br>
    
        <input name="change_info" class="submit_btn" type="submit" value="Edit" />
    </form>
</div>
