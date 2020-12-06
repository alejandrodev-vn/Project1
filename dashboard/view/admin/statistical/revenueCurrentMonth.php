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

<div class="right__cards">
        <a class="right__card" href="view_product.html">
            <div class="right__cardTitle">Products</div>
            <div class="right__cardNumber">72</div>
            <div class="right__cardDesc">See more <img src="../public/assets/arrow-right.svg" alt=""></div>
        </a>
        <a class="right__card" href="view_customers.html">
            <div class="right__cardTitle">User</div>
            <div class="right__cardNumber">12</div>
            <div class="right__cardDesc">See more <img src="../public/assets/arrow-right.svg" alt=""></div>
        </a>
        <a class="right__card" href="view_p_category.html">
            <div class="right__cardTitle">Category</div>
            <div class="right__cardNumber">4</div>
            <div class="right__cardDesc">See more <img src="../public/assets/arrow-right.svg" alt=""></div>
        </a>
        <a class="right__card" href="view_orders.html">
            <div class="right__cardTitle">Bill</div>
            <div class="right__cardNumber">72</div>
            <div class="right__cardDesc">See more <img src="../public/assets/arrow-right.svg" alt=""></div>
        </a>
    </div>
    <div class="right__table">
        <p class="right__tableTitle">Revenue in <script> var d = new Date(); document.write( d.getMonth() ) </script> </p>
        <div class="right__tableWrapper">
            <?PHP
            if (!empty($data)) {
            ?>
                <table>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Date</th>
                            <th>Total Day</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 0;
                        $total = 0;
                        foreach ($data as $value) {         ?>
                            <tr>
                                <td><?php echo $i+1?></td>
                                <td><?php echo $value->date ?></td>
                                <td><?php echo $value->totalDay?></td>
                                <?PHP $total += $value->totalDay ?>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Total Current Month : <?PHP echo $total ?></td>
                        </tr>
                        
                   <?PHP } else { ?>
                        <h1> Không có số liệu </h1>



                    <?PHP } ?>
                    </tbody>
                </table>
        </div>
    </div>
    </div>
</body>

</html>