<?php
    session_start();

    require_once ("../model/connect.php");
    require_once ("../model/shop.php");  
//    connect();
        $conn = connect();
        $IMAGE_DIR =  "../images/";
    include_once "../view/header.php";
    if(isset($_GET["act"])){
        $act= $_GET["act"];
        switch($act){
                            
            case 'about':
                    include "../view/about.php";
                    break;
            case 'checkouttr':
                     echo "<script type='text/javascript'>alert('Thanh toán thành công');</script>";
                    break;
            case 'blog-details':
                    include "../view/blog-details.php";
                    break;
            case 'blog':
                    include "../view/blog.php";
                    break;
            case 'shopping-cart':
                    include "../view/cart.php";
                    break;                    
            case 'change_pass':
                $MESSAGE="";
                if(isset($_SESSION['username'])){
                        include '../model/changepass.php';  
                        include "../view/change_pass.php";
                                      
                        if(isset($_POST["change_pass"])) {
                        $idUser = $_POST["idUser"];    
                        $old_password = @MD5($_POST["old_password"]);
                        $new_password =@($_POST['new_password']);
                        $passwordcf = @($_POST['passwordcf']);

                        if ($old_password != $_SESSION['username']['password'])
                        {
                                echo "<script type='text/javascript'>alert('Mật khẩu cũ nhập không chính xác, đảm bảo đã tắt caps lock');</script>";
                        
                        }
                        else if (strlen($new_password) < 6)
                        {
                                echo "<script type='text/javascript'>alert('Mật khẩu quá ngắn, hãy thử với mật khẩu khác an toàn hơn');</script>";
                        
                        }
                        else if ($new_password != $passwordcf)
                        {
                                echo "<script type='text/javascript'>alert('Nhập lại mật khẩu mới không khớp, đảm bảo đã tắt caps lock');</script>";
                        
                        }
                        else
                        {
                                
                                $new_password = md5($new_password);
                                $sql_change_pass = "UPDATE user SET password = '$new_password' WHERE idUser = $idUser";                                
                                $conn->query($sql_change_pass);                                
                                if($sql_change_pass) {                                
                                        echo "<script type='text/javascript'>alert('Change password successfully');</script>"; 
                                        unset($_SESSION['username']);
                                       
                                } else {
                                        echo "<script type='text/javascript'>alert('Change password failed!');</script>"; 
                                }
                                
                        }
                }
                        }else{
                                include "../view/login/login-form.php";
                                $MESSAGE = "";
                                
                        }

                
                    break;
            case 'checkout':
                        $MESSAGE="";
                        if(isset($_SESSION['username'])){
                                include "../view/checkout.php";
                                $MESSAGE="";
                        }
                        else{
                                include "../view/login/login-form.php";
                                $MESSAGE="";
                        }
                    break;
            case 'confirmation':
                    include "../view/confirmation.php";
                    break;
            case 'contact':
                    include "../view/contact.php";
                    break;
            case 'productDetail':
                    include "../model/Products.php";
                    include "../model/ProductDetail.php";
                    $data = "";
                    $size = "";
                    if(isset($_GET['id'])&&$_GET['id']>0){
                        $id= $_GET['id'];
                        $data = getProductDetail($conn, $id);
                        if(isset($_GET['idDetail'])&&$_GET['idDetail']>0){
                                $idDetail= $_GET['idDetail'];
                                $size = getProductDetailById($conn, $idDetail);
                        }
                    }else {
                        $pro=0;
                    }
                    // echo"<pre>";
                    // print_r($data);
                    include "../view/product_details.php";
                    
                    break;
            case 'shop':
                include "../model/ProductDetail.php";
                include "../model/Products.php";
                $products = getAllProduct($conn);
                $brand = getAllBrand();
                $group = getAllGroup();
                    include "../view/shop.php";
                    break;
            case 'register':
                    include "../view/register.php";
                    break;
            case 'login':
                    //login
                        require "../model/user.php";
                        $MESSAGE="";
                        extract($_REQUEST);
                        if(array_key_exists("login", $_REQUEST)){
                        $user = khach_hang_select_by_id($username);
                        if($user){
                                if($user['password'] == MD5($password)){        
                                $MESSAGE = "Đăng nhập thành công!"; 
                                $_SESSION["username"] = $user;                                                 
                                }else{
                                $MESSAGE = "Sai mật khẩu!";
                                }                              
                        }else{
                                $MESSAGE = "Sai ten đăng nhập!";
                        }}                        
                    if(isset($_SESSION['username'])){
                        include '../view/login/info.php';
                    }else{         
                        include "../view/login/login-form.php";
                    }                        
                    //logout
                    // if(isset($_GET['logout'])){
                    //     unset($_SESSION['username']);
                    //     // header
                    //     include "../view/login/login-form.php";
                  
                    //     } 
                    break;
            case 'logout': 
                      unset($_SESSION['username']);
                      $MESSAGE = 'đăng xuất thành công';
                        // header
                        echo "<script type='text/javascript'>alert('$MESSAGE');</script>";
                        $MESSAGE = '';

                        include "../view/login/login-form.php";
            break;

            case 'forgot_password':
                        include "../model/Fotgot_password.php";
                        include "../view/forgotpassword.php";
                        if(isset($_POST['fpw_btn'])) {
                                $email = $_POST['email'];
                                $message = forgot_password($conn, $email);
                                echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                break;
        case "create_account":
                include "../model/create-account.php";
                include '../view/login/create-account.php';
                if(isset($_POST["create"])) {
                        $full_name = $_POST["full_name"];
                        $email = $_POST["email"];
                        $address = $_POST["address"];
                        $phone = $_POST["phone"];
                        $date = $_POST["date"];
                        $username = $_POST["username"];
                        $password = $_POST["password"];

                        if(empty($full_name) || empty($email) || empty($address) || empty($phone) || empty($date) || empty($username) || empty($password)) {
                                echo "<script type='text/javascript'>alert('Vui lòng điền đầy đủ các trường để đăng ký');</script>";
                        } else {
                                $result = create_account($conn, $full_name, $email, $address, $phone, $date, $username, MD5($password));
                                if($result) {
                                        echo "<script type='text/javascript'>alert('Đăng ký thành công');</script>"; 
                                } else {
                                        echo "<script type='text/javascript'>alert('Đăng ký thất bại');</script>"; 
                                }
                        }

                       
                }

        break;

            case 'cart':
                        include_once "../view/cart.php";
                        break;

            default:
                include "../model/Products.php";
                include_once "../view/home.php";
                break;
    } 
    }else {
        include "../model/ProductDetail.php";
        include "../model/Products.php";
        $data = getFlashSale($conn);
        $newProducts = getProductsNew($conn);
        $bestSeller = getProductsPoppular($conn);
        $products = getAllProduct($conn);
        include_once "../view/home.php";
    }
  
    include_once "../view/footer.php";
?>