<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>

    <p class="right__desc">Bảng điều khiển</p>
    <div class="right__cards">
        <a class="right__card" href="view_product.html">
            <div class="right__cardTitle">Sản Phẩm</div>
            <div class="right__cardNumber">72</div>
            <div class="right__cardDesc">Xem Chi Tiết <img src="../public/assets/arrow-right.svg" alt=""></div>
        </a>
        <a class="right__card" href="view_customers.html">
            <div class="right__cardTitle">Khách Hàng</div>
            <div class="right__cardNumber">12</div>
            <div class="right__cardDesc">Xem Chi Tiết <img src="../public/assets/arrow-right.svg" alt=""></div>
        </a>
        <a class="right__card" href="view_p_category.html">
            <div class="right__cardTitle">Danh Mục</div>
            <div class="right__cardNumber">4</div>
            <div class="right__cardDesc">Xem Chi Tiết <img src="../public/assets/arrow-right.svg" alt=""></div>
        </a>
        <a class="right__card" href="view_orders.html">
            <div class="right__cardTitle">Đơn Hàng</div>
            <div class="right__cardNumber">72</div>
            <div class="right__cardDesc">Xem Chi Tiết <img src="../public/assets/arrow-right.svg" alt=""></div>
        </a>
    </div>
    <div class="right__table">
        <p class="right__tableTitle">Danh sách đơn hàng</p>
        <div class="right__tableWrapper">
            <?PHP
            if (!empty($data)) {
            ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID Product Detail</th>
                            <th>ID Product </th>
                            <th> Color</th>
                            <th>Size </th>
                            <th>Price</th>
                            <th>Old Price</th>
                            <th>IMG URL</th>
                            <th>Quantity</th>
                            <th>Xoá</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        foreach ($data as $value) {         ?>
                            <tr>
                                <td><?php echo $value->idProductDetail ?></td>
                                <td><?php echo $value->idProduct ?></td>
                                <td><?php echo $value->color ?></td>
                                <td><?php echo $value->size ?></td>
                                <td><?php echo $value->price ?></td>
                                <td><?php echo $value->oldPrice ?></td>
                                <td><img style="width: 50px; heigh:auto;" src="<?php echo  $IMAGE_DIR . $value->imgUrl ?>"></td>
                                <td><?php echo $value->quantity ?></td>
                                <td class="text-center">
                                    <a href="?act=products&deleteDetail=<?PHP echo $value->idProductDetail ?>" class="btn-edit">Del</a>
                                </td>
                                <td class="text-center">
                                    <a href="?act=products&editDetail=<?PHP echo $value->idProductDetail ?>" class="btn-edit">Edit</a>


                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <h1> Hiện không có dữ liệu trong bảng</h1>


                    <?PHP } ?>


                    </tbody>

                </table>
                </td>
                <td class="text-center">
                    <a href="?act=products&newDetail=<?PHP echo $idPRD ?>" class="btn-edit">Add new</a>
                </td>
        </div>
    </div>
</body>

</html>