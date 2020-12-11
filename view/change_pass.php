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
<?php } ?>


