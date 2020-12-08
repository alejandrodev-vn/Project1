
  <main>
  <?php
 
  $cart=(isset($_SESSION['cart']))? $_SESSION['cart'] : [];
  
// echo'<pre>';
//   var_dump($cart);
  // var_dump($_SESSION['username']);
  // session_destroy();
  //   die(); 
  
  ?>

      <!-- Hero Area Start-->
      <div class="slider-area ">
          <div class="single-slider slider-height2 d-flex align-items-center">
              <div class="container">
                  <div class="row">
                      <div class="col-xl-12">
                          <div class="hero-cap text-center">
                              <h2>Cart List</h2>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--================Cart Area =================-->
      <form action="cart.php">
      <section class="cart_area section_padding">
        <div class="container">
          <div class="cart_inner">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Product</th>
                    <th scope="col">ID</th>
                    <th scope="col">color</th>
                    <th scope="col">Size</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $total_price = 0; ?>
                <?php foreach($cart as $k =>$v):
                 $total_price += ($v['price'] * $v['quantity']);
                ?>
                  <tr>
                    <td>
                      <div class="media">
                        <div class="d-flex">
                          <img src="../view/assets/img/gallery/card1.png" alt="" />
                        </div>
                        <div class="media-body">
                          <p></p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <h5><?=$k?></h5>
                    </td>
                    <td>
                      <h5><?=$v['color']?></h5>
                    </td>
                    <td>
                      <h5><?=$v['size']?></h5>
                    </td>
                    <td>
                      <h5>$<?=$v['price']?>.00</h5>
                    </td>                    
                    <td>
                    
                      <input type="hidden" name="action" value="update">
                      <input type="hidden" name="id" value="<?=$k?>">
                      <div class="product_count">
                        <!-- <span class="input-number-decrement"> <i class="ti-minus"></i></span> -->
                        <input name ="quantity" class="input-number" type="number" value="<?=$v['quantity']?>" min="0" max="10">
                        <!-- <span class="input-number-increment"> <i class="ti-plus"></i></span> -->
                      </div>
                      </td>                    
                    <td>
                      <h5>$<?=$v['price']*$v['quantity']?>.00</h5>
                    </td>
                    <td>
                    <a href="cart.php?id=<?php echo $v['id'] ?>&action=delete">del</a>
                    </td>
                  </tr>
                 
                  <?php endforeach ?>
                  <tr class="bottom_button">
                    <td>
                    <button type="submit" class="btn_1"> Update Cart</button>
                      <!-- <a class="btn_1" href="">Update Cart</a> -->
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <div class="cupon_text float-right">
                        <a class="btn_1" href="#">Close Coupon</a>
                      </div>
                    </td>
                  </tr>
                  
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <h5>Subtotal</h5>
                    </td>
                    <td>
                      <h5>$<?=$total_price?>.00</h5>
                    </td>
                  </tr>
                  </form>
                  <tr class="shipping_area">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <h5>Shipping</h5>
                    </td>
                    <td>
                      <div class="shipping_box">
                        <ul class="list">
                          <li>
                            Flat Rate: $5.00
                            <input type="radio" name="shipping" aria-label="Radio button for following text input">
                          </li>
                          <li>
                            Free Shipping
                            <input type="radio" name="shipping" aria-label="Radio button for following text input">
                          </li>
                          <li>
                            Flat Rate: $10.00
                            <input type="radio" name="shipping" aria-label="Radio button for following text input">
                          </li>
                          <li class="active">
                            Local Delivery: $2.00
                            <input type="radio" name="shipping" aria-label="Radio button for following text input">
                          </li>
                        </ul>
                        <h6>
                          Calculate Shipping
                          <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </h6>
                        <select class="shipping_select">
                          <option value="1">Bangladesh</option>
                          <option value="2">India</option>
                          <option value="4">Pakistan</option>
                        </select>
                        <select class="shipping_select section_bg">
                          <option value="1">Select a State</option>
                          <option value="2">Select a State</option>
                          <option value="4">Select a State</option>
                        </select>
                        <input class="post_code" type="text" placeholder="Postcode/Zipcode" />
                        <a class="btn_1" href="#">Update Details</a>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="checkout_btn_inner float-right">
              
                <a class="btn_1" href="#">Continue Shopping</a>
                <a class="btn_1 checkout_btn_1" href="index.php?act=checkout">Proceed to checkout</a>
                <!-- <form action="bill.php" method="post">
                <button name="btn_thanhtoan" type="submit" class="btn_1 checkout_btn_1"> Proceed to checkout</button>
                </form> -->
              </div>
            </div>
          </div>
      </section>
     
      <!--================End Cart Area =================-->
  </main>
