<?php
    if(isset($_GET['search'])){
        require_once("../model/connect.php");
        require_once("../model/shop.php");
        $product = getAllShop() ;
        $sp = '';
        $content = $_GET['search'];
        if($content == ""){
            $sp = '';
        }else{
            foreach($product as $p){
                if(strlen(strpos(strtolower($p['nameProduct']),strtolower($content)))>0){
                    $sp .= '<li style="padding: 15px;border-top: 1px solid #c7c7c7;transform: scale(1);"><a href="?act=productDetail&id='.$p['idProduct'].'">'.$p['nameProduct'].'</a></li>';
                }
            }
        }
        echo $sp;
    }else{
        session_start();
        require_once("../model/connect.php");
        require_once("../model/shop.php");
        require_once("../model/products.php");
        $conn = connect();
        if(isset($_GET['group'])){
            $id = $_GET['group'];
            $name = 'group';
            $_SESSION['group'] = array('name'=>$name,'value'=>$id);
            $group = getAllGroupById($id);
            if(!empty($_SESSION['filter'])){
                $name = $group['nameGroupProduct'];
                if(in_array($name,array_column($_SESSION['filter'],'name'))){
                    foreach($_SESSION['filter'] as $key => $values){
                        if($values['name'] == $name){
                            unset($_SESSION['filter'][$key]);
                        }
                    }
                }
            }
        }
        if(isset($_GET['category']) || isset($_GET['brand'])){
            if(isset($_GET['category'])){
            $name = $_GET['category'];
                $value = $_GET["$name"]; 
            }else if(isset($_GET['brand'])){
                $value = $_GET['brand'];
                $name = 'brand';
            }
            if(!isset($_SESSION['filter'])){
                $_SESSION['filter'] = array('0'=>array('name'=>$name,'value'=>$value));
            }else{
                if(in_array($name,array_column($_SESSION['filter'],'name'))){
                    foreach($_SESSION['filter'] as $key => $values){
                        if($values['name'] == $name){
                            $_SESSION['filter'][$key]['name'] = $name;
                            $_SESSION['filter'][$key]['value'] = $value;
                        }
                    }
                    if(!empty($_SESSION['group'])){
                        $id = $_SESSION['group']['value'];
                        $name = $_SESSION['group']['name'];
                        $group = getAllGroupById($id);
                        if(in_array($group['nameGroupProduct'],array_column($_SESSION['filter'],'name'))){
                            unset($_SESSION['group']);
                        }
                    }
                }else{
                    array_push($_SESSION['filter'],array('name'=>$name,'value'=>$value));
                }
            }
        }
        $where = '';
        if(!empty($_SESSION['filter'])){
            foreach($_SESSION['filter'] as $f){
                switch($f['name']){
                    case 'brand':
                        $where .= !empty($where) ? ' and products.idProduct in(Select products.idProduct from products INNER JOIN brand on idThuongHieu = idBrand where idThuongHieu = '.$f['value'].')' : ' INNER JOIN brand on idThuongHieu = idBrand where idThuongHieu = '.$f['value'].'';
                    break;

                    case 'Top':
                    case 'Bottom':
                    case 'Shoes':
                    case 'Accessories':
                    case 'Watch':
                        
                        $where .= !empty($where) ? ' and products.idProduct in(Select products.idProduct from products INNER JOIN category ON category.idCategory = products.idCategory where products.idCategory = '.$f['value'].')' : ' INNER JOIN category ON category.idCategory = products.idCategory where products.idCategory = '.$f['value'].'';
                    break;
                    }
            }
        }
        if(!empty($_SESSION['group'])){
            $where .= !empty($where) ? ' and products.idProduct in(Select products.idProduct from products INNER JOIN category ON category.idCategory = products.idCategory INNER JOIN groupproduct ON category.idGroupProduct = groupproduct.idGroupProduct where groupproduct.idGroupProduct = '.$_SESSION['group']['value'].')' : ' INNER JOIN category ON category.idCategory = products.idCategory INNER JOIN groupproduct ON category.idGroupProduct = groupproduct.idGroupProduct where groupproduct.idGroupProduct = '.$_SESSION['group']['value'].'';
        }
        // if(isset($_GET['status'])){
        //     $value = $_GET['status'];
        //     if($value == 0){
        //         $where .='';
        //     }else if($value == 1){
        //         if(!empty($where)){
        //             $where .= ' and products.idProduct in(SELECT DISTINCT *, SUM(billdetail.quantity) AS times
        //             FROM bill inner join billdetail on bill.idBill= billdetail.idBill inner join productdetail on billdetail.idProductDetail = productdetail.idProductDetail inner join products on products.idProduct = productdetail.idProduct
        //             GROUP BY productdetail.idProduct
        //             ORDER BY times DESC LIMIT 6)'
        //         }else{
        //             $select = ''
        //         }
        //          ' *, SUM(billdetail.quantity) AS times
        //         FROM bill inner join billdetail on bill.idBill= billdetail.idBill inner join productdetail on billdetail.idProductDetail = productdetail.idProductDetail inner join products on products.idProduct = productdetail.idProduct
        //         GROUP BY productdetail.idProduct
        //         ORDER BY times DESC LIMIT 6';
        // }
        if(isset($_GET['price'])){
            $value = $_GET['price'];
            if($value == 0){
                $where .='';
            }else if($value == 1){
                $where .= ' order by price desc';
            }else if($value == 2){
                $where .= ' order by price asc';
            }else if($value == 3){
                $where .= ' order by date asc';
            }else if($value == 4){
                $where .= ' order by flashSale asc';
            }
        }
        $getProduct = getAllProductByFilter($where);
        $products = '';
        foreach($getProduct as $product){
        $products .= '
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4">
            <div class="single-product-items mb-50 text-center">
                    <div class="product-img">
                        <img src="../images/'.$product['imgUrl'].'" alt="product">
                        <div class="img-cap">
                            <a href="?act=cart&id='.$product['idProductDetail'].'">Add to cart</a>
                        </div>
                        <div class="favorit-items">
                            <span class="flaticon-heart"></span>
                        </div>
                    </div>
                    <div class="product-caption">
                        <h3><a href="?act=productDetail&id='.$product['idProduct'].'">'.$product['nameProduct'].'</a></h3>
                    </div>
                    <div class="product-content">
                        <div class="price">
                            <span class="new-price">$'.$product['price'].'</span>
                            <span class="old-price">$'.$product['oldPrice'].'</span>
                        </div>
                        <div class="sold">
                            <div class="percent"></div>
                            <div class="text"><p>Còn lại: 2</p></div>
                        </div>
                        <div class="countdown" id="countdown"><p>1 ngày 15:23:17</p></div>
                    </div> 
                </div>
            </div>
        ';}
        $myArr = array(array($products));
        if(isset($_SESSION['filter'])){
            foreach($_SESSION['filter'] as $filter => $f){
                array_push($myArr,array($f['name'],$f['value']));
            }
        }
        if(isset($_SESSION['group'])){
            array_push($myArr,array($_SESSION['group']['name'],$_SESSION['group']['value']));
        }
        echo json_encode($myArr);
        // echo $where;
        }
    