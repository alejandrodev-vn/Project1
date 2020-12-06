<?php 
    function getProductsNew($conn) {
        $sql = "SELECT * FROM `products` WHERE date BETWEEN '2020-11-20' and '2020-12-30' LIMIT 4";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }
    function getProductsPoppular($conn){
        $sql = "SELECT DISTINCT *, SUM(billdetail.quantity) AS times
        FROM bill inner join billdetail on bill.idBill= billdetail.idBill inner join productdetail on billdetail.idProductDetail = productdetail.idProductDetail inner join products on products.idProduct = productdetail.idProduct
        GROUP BY productdetail.idProduct
        ORDER BY times DESC LIMIT 6";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
      
    }

    function getProductDetail($conn, $id) {
        $sql = "SELECT products.`idProduct` , products.`nameProduct`,productDetail.`idProductDetail`,productDetail.`price` , productDetail.`oldPrice`,products.`imgUrl` , productDetail.`size`,productDetail.`quantity`,products.`flashSale`,products.`note`,products.`date`, products.`description` FROM `products`AS products INNER JOIN `productdetail` AS productDetail ON productDetail.`idProduct` = products.`idProduct` WHERE products.`idProduct` = '$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    function getAllProduct($conn) {
        // $sql = "SELECT idProduct, nameProduct,  FROM products";  WHERE products.`flashSale` = 1"
        $sql = "SELECT products.`idProduct` , products.`nameProduct`,productDetail.`idProductDetail`,productDetail.`price` , productDetail.`oldPrice`,products.`imgUrl` ,productDetail.`quantity`, products.`date`, products.`note` FROM `products`AS products INNER JOIN `productdetail` AS productDetail ON productDetail.`idProduct` = products.`idProduct` GROUP BY idProduct";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }
?>

