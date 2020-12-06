<div class="left">
    <span class="left__icon">
        <span></span>
        <span></span>
        <span></span>
    </span>
    <div class="left__content">
        <div class="left__logo"><img src="../public/assets/logo.png " width="70px" alt="logo"></div>
        <div class="left__profile">
            <div class="left__image"><img src="../public/assets/me.jpg" style="object-fit:cover" alt="avatar"></div>
            <p class="left__name">LV</p>
        </div>
        <ul class="left__menu">
            <li class="left__menuItem">
                <a href="index.php" class="left__title"><img src="../public/assets/icon-dashboard.svg" alt="">New Bill</a>
            </li>
            <li class="left__menuItem">
                <div class="left__title"><img src="../public/assets/icon-tag.svg" alt="">Products<img class="left__iconDown" src="../public/assets/arrow-down.svg" alt=""></div>
                <div class="left__text">
                    <?php require 'product/category-con.php' ?>
                </div>
            </li>
            <li class="left__menuItem">
                <div class="left__title"><img src="../public/assets/icon-edit.svg" alt="">Category<img class="left__iconDown" src="../public/assets/arrow-down.svg" alt=""></div>
                <div class="left__text">
                    <?php require 'category/category-con.php' ?>
                </div>
            </li>
            <li class="left__menuItem">
                <div class="left__title"><img src="../public/assets/icon-book.svg" alt="">Group Product<img class="left__iconDown" src="../public/assets/arrow-down.svg" alt=""></div>
                <div class="left__text">
                    <?php require 'groupproduct/category-con.php' ?>
                </div>
            </li>
            <li class="left__menuItem">
                <div class="left__title"><img src="../public/assets/icon-settings.svg" alt="">Brand<img class="left__iconDown" src="../public/assets/arrow-down.svg" alt=""></div>
                <div class="left__text">
                    <?php require 'brand/category-con.php' ?>
                </div>
            </li>
            <li class="left__menuItem">
                <div class="left__title"><img src="../public/assets/icon-user.svg" alt="">Role<img class="left__iconDown" src="../public/assets/arrow-down.svg" alt=""></div>
                <div class="left__text">
                    <?php require 'role/category-con.php' ?>
                </div>
            </li>

            <li class="left__menuItem">
                <a href="?act=user&show" class="left__title"><img src="../public/assets/icon-users.svg" alt="">User</a>
            </li>
            <li class="left__menuItem">
                <a href="?act=bill&show" class="left__title"><img src="../public/assets/icon-book.svg" alt="">Bill</a>
            </li>
            <li class="left__menuItem">
                <a href="?act=comment&show" class="left__title"><img src="../public/assets/icon-book.svg" alt="">Comment</a>
            </li>
            <li class="left__menuItem">
                <a href="?act=rating&show" class="left__title"><img src="../public/assets/icon-book.svg" alt="">Rating</a>
            </li>
            <li class="left__menuItem">
                <div class="left__title"><img src="../public/assets/icon-user.svg" alt="">Statistical<img class="left__iconDown" src="../public/assets/arrow-down.svg" alt=""></div>
                <div class="left__text">
                    <?php require 'statistical/category-con.php' ?>
                </div>
            </li>
            <li class="left__menuItem">
                <a href="" class="left__title"><img src="../public/assets/icon-logout.svg" alt="">Logout</a>
            </li>

        </ul>
    </div>
</div>