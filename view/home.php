    <main>
       <!--hero-->
       <div class="container-fluid">
           <div class="row">
            <div class="hero">
                <div class="hero__woman">
                </div>
                <div class="hero__container-slider">
                    <div class="slider" id="slider">
                        <div class="slider__slide">
                            <h1>Top</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus voluptas cupiditate laborum veniam, molestias porro!</p>
                            <a href="?act=shop" class="btn-header">Let's go!!</a>
                        </div>
                        <div class="slider__slide">
                            <h1>Bottom</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus voluptas cupiditate laborum veniam, molestias porro!</p>
                            <a href="?act=shop" class="btn-header">Let's go!!</a>
                        </div>
                        <div class="slider__slide">
                            <h1>Shoes</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus voluptas cupiditate laborum veniam, molestias porro!</p>
                            <a href="?act=shop" class="btn-header">Let's go!!</a>
                        </div>
                        <div class="slider__slide">
                            <h1>Watch & Jewellery</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus voluptas cupiditate laborum veniam, molestias porro!</p>
                            <a href="?act=shop" class="btn-header">Let's go!!</a>
                        </div>
                    </div>
                    <div class="index-slider">
                        <div id="active"></div>
                        <div id="line1"></div>
                        <div id="line2"></div>
                        <div id="line3"></div>
                        <div id="line4"></div>
                    </div>
                    <script>
                        slider = document.getElementById('slider');
                        active = document.getElementById('active');
                        line1 = document.getElementById('line1');
                        line2 = document.getElementById('line2');
                        line3 = document.getElementById('line3');
                        line4 = document.getElementById('line4');
                        line1.onclick = function (){
                            slider.style.transform = 'translateX(0)';
                            active.style.left = '0px';
                        }
                        line2.onclick = function (){
                            slider.style.transform = 'translateX(-25%)';
                            active.style.left = '60px';
                        }
                        line3.onclick = function (){
                            slider.style.transform = 'translateX(-50%)';
                            active.style.left = '120px';
                        }
                        line4.onclick = function (){
                            slider.style.transform = 'translateX(-75%)';
                            active.style.left = '180px';
                        }
                    </script>
                </div>
            </div>
         </div>
        </div>
        <!--hero-->
        <!-- ? Flash-sale Start -->
        <section class="flash-sale-area section-padding30">
            <div class="container">
                <!-- Section tittle -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-tittle mb-70">
                            <h2>Flash <img src="../view/assets/img/adapt_icon/flash-sale.svg"  alt="icon-flash-sale"> Sale</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                        
                    <?php foreach($data as $val ) {?>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="single-flash-sale mb-30 text-center">
                                <div class="flash-sale-img">
                                    <img src="<?= $IMAGE_DIR.$val['imgUrl']; ?>" alt="collection">
                                    <div class="flash-sale-cart">
                                    <a href="cart.php?id=<?=$val['idProductDetail']?>">Add to cart</a>
                                </div>
                                </div>
                                <div class="flash-sale-caption">
                                    <h3 style=" overflow: hidden; white-space: nowrap; text-overflow: ellipsis; "><a title="<?= $val['nameProduct'] ?>" href="?act=productDetail&id=<?= $val['idProduct'];?>"><?= $val['nameProduct'] ?></a></h3>
                                </div>
                                <div class="flash-sale-content">
                                    <div class="price">
                                        <span class="new-price">$ <?= $val['price']; ?></span>
                                        <span class="old-price">$ <?= $val['oldPrice']; ?></span>
                                        <span class="discount">-<?= $val['note']; ?>%</span>
                                    </div>
                                    <div class="sold">
                                        <div class="percent"></div>
                                        <div class="text"><p>Rest: <?= $val['quantity'];?></p></div>
                                    </div>
                                    <div class="countdown" id="countdown"><p>1 ngày 15:23:17</p></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!--  Flash-sale End -->
        <!--? Gallery Area Start -->
        <div class="gallery-area">
            <div class="container-fluid p-0 fix">
                <div class="row">
                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img big-img" style="background-image: url(https://static.zara.net/photos///contents/mkt/spots/aw20-north-collection-man/subhome-xmedia-45//w/1945/landscape_0.jpg?ts=1604680108841);"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img big-img" style="background-image: url(https://static.zara.net/photos///2020/I/M/2/p/0000/006/535/2/w/1884/0000006535_9_2_1.jpg?ts=1603819629941);"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-12">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6">
                                <div class="single-gallery mb-30">
                                    <div class="gallery-img small-img" style="background-image: url(../view/assets/img/gallery/2969288400_1_1_1.webp);"></div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12  col-md-6 col-sm-6">
                                <div class="single-gallery mb-30">
                                    <div class="gallery-img small-img" style="background-image: url(../view/assets/img/gallery/1.jpg);"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Gallery Area End -->
        <!--? Popular Items Start -->
        <div class="popular-wrapper section-padding30">
            <div class="container">
                <!-- Section tittle -->
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="section-tittle mb-70 text-center">
                            <h2>Popular Items</h2>
                            <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php foreach($bestSeller as $val ) {?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center">
                            <div class="popular-img">
                                <img src="<?= $IMAGE_DIR.$val['imgUrl']; ?>" alt="Best Seller">
                                <div class="img-cap">
                                    <a href="cart.php?id=<?=$val['idProductDetail']?>">Add to cart</a>
                                </div>
                                <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div>
                            </div>
                            <div class="popular-caption">
                                <h3><a href="?act=productDetail&id=<?= $val['idProduct'];?>"><?= $val['nameProduct']; ?></a></h3>
                            </div>
                            <div class="popular-content">
                                <div class="price">
                                    <span class="new-price">$ <?= $val['price']; ?></span>
                                    <span class="old-price">$ <?= $val['oldPrice']; ?></span>
                                    <span class="discount">-<?= $val['note']; ?>%</span>
                                </div>
                                <div class="sold">
                                    <div class="percent"></div>
                                    <div class="text"><p>Rest: <?= $val['quantity']; ?></p></div>
                                </div>
                                <div class="countdown" id="countdown"><p>1 ngày 15:23:17</p></div>
                            </div> 
                        </div>
                    </div>
                <?php } ?>
                </div>
                <!-- Button -->
                <div class="row justify-content-center">
                    <div class="room-btn pt-70">
                        <a href="?act=shop" class="btn view-btn1">View More Products</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Popular Items End -->
        <!--? Watch Choice  Start-->
        <div class="watch-area mb-40">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 text-xl-center">
                        <h2 style="color: #ff8420;font-size: 48px;font-weight: 700 line-height: 1;text-align:center" class="mb-40">
                            New Arrival
                        </h2>
                    </div>
                    <?php foreach( $newProducts as $newProduct){?>
                        <div class="col-lg-3 col-md-6 col-sm-10">
                            <div class="choice-watch-img">
                                <img src="<?= $IMAGE_DIR.$newProduct['imgUrl']?>" alt="new-Product">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 pt-5">
                            <div class="watch-details">
                                <h3 title="<?= $newProduct['nameProduct']?>"><?= $newProduct['nameProduct']?></h3>
                                <p style="display: -webkit-box;-webkit-line-clamp: 5;-webkit-box-orient: vertical;text-overflow: ellipse;overflow: hidden;">
                                    <?= $newProduct['description']?>
                                </p>
                                <a href="?act=productDetail&id=<?= $newProduct['idProduct']?>" class="btn">Show Detail</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- Watch Choice  End-->
        <!--? Shop Method Start-->
        <div class="shop-method-area">
            <div class="container">
                <div class="method-wrapper">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-method mb-40">
                                <i class="ti-package"></i>
                                <h6>Free Shipping Method</h6>
                                <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-method mb-40">
                                <i class="ti-unlock"></i>
                                <h6>Secure Payment System</h6>
                                <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                            </div>
                        </div> 
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-method mb-40">
                                <i class="ti-reload"></i>
                                <h6>Secure Payment System</h6>
                                <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Method End-->
    </main>
   