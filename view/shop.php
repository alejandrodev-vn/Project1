<main>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Shop</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End-->
    <section class="product-wrapper latest-padding">
        <div class="container">
            <div class="row">
                <h3><a href="?act=shop">Shop</a></h3>
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <nav class="nav-product nav nav-tabs" id="nav-tab" role="tablist">
                        <ul class="nav-parents">
                            <li class="fil">Filter by:</li>
                            <li>
                                <ul>
                                    <li>
                                        <select onchange="filter()" name="filterByPrice" id="filterByPrice">
                                            <option value="0">Price:</option>
                                            <option value="1">High to Low</option>
                                            <option value="2">Low to High</option>
                                            <option value="3">New Arrival</option>
                                            <option value="4">Flash Sale</option>
                                        </select>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li>
                                        <select onchange="status()" name="filterByStatus" id="filterByStatus">
                                            <option value="0">Status:</option>
                                            <option value="1">Best Seller</option>
                                        </select>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xl-12 col-md-12 custom_btn">
                    <ul>
                        <li class="submit_btn" id="custom">Custom <i class="fas fa-angle-down"></i></li>
                    </ul>
                </div>
            </div>
            <script>
            function filter() {
                var price = document.getElementById("filterByPrice").value;
                var product = document.getElementById('productWrapper')
                // alert(price)
                $.ajax({
                    url: '../view/ajax.php',
                    type: 'GET',
                    data: 'price=' + price,
                    success: function(data) {
                        var myObj = JSON.parse(data);
                        product.innerHTML = myObj[0];
                        x = 'index.php?act=shop';
                        for (i = 1; i < myObj.length; i++) {
                            x += '&' + myObj[i][0] + '=' + myObj[i][1]
                        }
                        history.pushState('', '', x)
                        // alert(data);
                    }
                });
                return false;
            }
            // function status(){
            //     var status = document.getElementById("filterByStatus").value;
            //     var product = document.getElementById('productWrapper')
            //     // alert(price)
            //     $.ajax({
            //         url: '../view/ajax.php',
            //         type: 'GET',
            //         data: 'status=' + status,
            //         success: function(data) {
            //             var myObj = JSON.parse(data);
            //             product.innerHTML = myObj[0];
            //             x = 'index.php?act=shop';
            //             for (i = 1; i < myObj.length; i++) {
            //                 x += '&' + myObj[i][0] + '=' + myObj[i][1]
            //             }
            //             history.pushState('', '', x)
            //             // alert(data);
            //         }
            //     });
            //     return false;
            // }
            </script>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <aside id="filter" class="hidden-xs hidden-sm">
                        <ul class="filter__wrapper">
                            <li class="filter__tree" >
                                <p class="filter__tree-title">Brands<i class="fas fa-angle-down"></i></p>
                                <ul class="filter__tree-content">
                                    <?php
                                        unset($_SESSION['filter']);
                                        unset($_SESSION['group']);
                                            foreach($brand as $brands){
                                                echo '
                                                    <li onclick = "brand('.$brands['idThuongHieu'].');"><label class><input type="checkbox" name="checkboxStatus" value="louis-vuitton" hidden>'.$brands['nameBrand'].'<span class="checkbox-x"></span></label></li>
                                                ';
                                            }
                                        ?>
                                </ul>
                            </li>
                            <li class="filter__tree" id="tree">
                                <p class="filter__tree-title">Group<i class="fas fa-angle-down"></i></p>
                                <ul class="filter__tree-content">
                                    <?php
                                        foreach($group as $groups){
                                            echo '
                                                <li onclick = "group('.$groups['idGroupProduct'].');"><label class><input type="checkbox" id="filterTop" name="checkboxStatus" value="top" hidden>'.$groups['nameGroupProduct'].'<span class="checkbox-x"></span></label></li>
                                            ';
                                        }
                                    ?>
                                </ul>
                            </li>
                            <?php
                                foreach($group as $groups){
                                echo '
                                    <li class="filter__tree" >
                                        <p class="filter__tree-title">'.$groups['nameGroupProduct'].'<i class="fas fa-angle-down"></i></p>
                                        <ul class="filter__tree-content" >
                                        ';
                                        $id = $groups['idGroupProduct'];
                                        $category = getAllGroupProductById($id);
                                        foreach($category as $c){
                                            echo '
                                            <li onclick = "'.$groups['nameGroupProduct'].'('.$c['idCategory'].')"><label class><input type="checkbox" id="filterTop" name="checkboxStatus" value="top" hidden>'.$c['nameCategory'].'<span class="checkbox-x"></span></label></li>
                                            ';
                                        }
                                    echo '                                       
                                        </ul>
                                    </li>
                                ';
                                }
                            ?>
                        </ul>
                    </aside>
                </div>
                <!--product-area-->
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="row" id="productWrapper">
                        <!--single-product-->
                        <?php
                            foreach($products as $product)
                            { ?>
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4">
                                    <div class="single-product-items mb-50 text-center">
                                        <div class="product-img">
                                            <?php if($product['flashSale']==1){echo '<input type="text" class="type" value="flashSale" hidden>';} else {echo '<input type="text" class="type" value="new" hidden>';} ?>
                                            <img src="<?=$IMAGE_DIR.$product['imgUrl']?>" alt="product">
                                            <div class="img-cap">
                                                <a href="cart.php?id=<?=$product['idProductDetail']?>">Add to cart</a>
                                            </div>
                                            <div class="favorit-items">
                                                <span class="flaticon-heart"></span>
                                            </div>
                                        </div>
                                        <div class="product-caption">
                                            <h3><a href="?act=productDetail&id=<?=$product['idProduct']?>"><?=$product['nameProduct']?></a></h3>
                                        </div>
                                        <div class="product-content">
                                            <div class="price">
                                                <span class="new-price">$<?=$product['price']?></span>
                                                <span class="old-price">$<?=$product['oldPrice']?></span>
                                            </div>
                                            <div class="sold">
                                                <div class="percent"></div>
                                                <div class="text"><p>Rest: <?=$product['quantity']?></p></div>
                                            </div>
                                            <div class="countdown" id="countdown"><p>1 ngày 15:23:17</p></div>
                                        </div> 
                                    </div>
                                </div>
                                <?php } ?>

                        <!--single-product-->
                    </div>
                    <!--end row product-->
                </div>
                <!--product-area-->
            </div>
        </div>
    </section>
</main>
<script>
function brand(p) {
    var product = document.getElementById('productWrapper')
    $.ajax({
        url: '../view/ajax.php',
        type: 'GET',
        data: 'brand=' + p,
        success: function(data) {
            var myObj = JSON.parse(data);
            product.innerHTML = myObj[0];
            x = 'index.php?act=shop';
            for (i = 1; i < myObj.length; i++) {
                x += '&' + myObj[i][0] + '=' + myObj[i][1]
            }
            history.pushState('', '', x)
            // alert(data);
        }
    });
    return false;
}

function group(p) {
    var product = document.getElementById('productWrapper')
    $.ajax({
        url: '../view/ajax.php',
        type: 'GET',
        data: 'group=' + p,
        success: function(data) {
            var myObj = JSON.parse(data);
            product.innerHTML = myObj[0];
            x = 'index.php?act=shop';
            for (i = 1; i < myObj.length; i++) {
                x += '&' + myObj[i][0] + '=' + myObj[i][1]
            }
            history.pushState('', '', x)
            // alert(data);
        }
    });
    return false;
}

function Top(p) {
    var product = document.getElementById('productWrapper')
    $.ajax({
        url: '../view/ajax.php',
        type: 'GET',
        data: 'category=Top&Top=' + p,
        success: function(data) {
            var myObj = JSON.parse(data);
            product.innerHTML = myObj[0];
            x = 'index.php?act=shop';
            for (i = 1; i < myObj.length; i++) {
                x += '&' + myObj[i][0] + '=' + myObj[i][1]
            }
            history.pushState('', '', x)
        }
    });
    return false;
}

function Bottom(p) {
    var product = document.getElementById('productWrapper')
    $.ajax({
        url: '../view/ajax.php',
        type: 'GET',
        data: 'category=Bottom&Bottom=' + p,
        success: function(data) {
            var myObj = JSON.parse(data);
            product.innerHTML = myObj[0];
            x = 'index.php?act=shop';
            for (i = 1; i < myObj.length; i++) {
                x += '&' + myObj[i][0] + '=' + myObj[i][1]
            }
            history.pushState('', '', x)
        }
    });
    return false;
}

function Shoes(p) {
    var product = document.getElementById('productWrapper')
    $.ajax({
        url: '../view/ajax.php',
        type: 'GET',
        data: 'category=Shoes&Shoes=' + p,
        success: function(data) {
            var myObj = JSON.parse(data);
            product.innerHTML = myObj[0];
            x = 'index.php?act=shop';
            for (i = 1; i < myObj.length; i++) {
                x += '&' + myObj[i][0] + '=' + myObj[i][1]
            }
            history.pushState('', '', x)
        }
    });
    return false;
}

function Accessories(p) {
    var product = document.getElementById('productWrapper')
    $.ajax({
        url: '../view/ajax.php',
        type: 'GET',
        data: 'category=Accessories&Accessories=' + p,
        success: function(data) {
            var myObj = JSON.parse(data);
            product.innerHTML = myObj[0];
            x = 'index.php?act=shop';
            for (i = 1; i < myObj.length; i++) {
                x += '&' + myObj[i][0] + '=' + myObj[i][1]
            }
            history.pushState('', '', x)
        }
    });
    return false;
}

function Watch(p) {
    var product = document.getElementById('productWrapper')
    $.ajax({
        url: '../view/ajax.php',
        type: 'GET',
        data: 'category=Watch&Watch=' + p,
        success: function(data) {
            var myObj = JSON.parse(data);
            product.innerHTML = myObj[0];
            x = 'index.php?act=shop';
            for (i = 1; i < myObj.length; i++) {
                x += '&' + myObj[i][0] + '=' + myObj[i][1]
            }
            history.pushState('', '', x)
        }
    });
    return false;
}
</script>