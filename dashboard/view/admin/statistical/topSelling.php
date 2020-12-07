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


    <div class="right__table">
        <p class="right__tableTitle">TOP SELLING PRODUCT</p>
        <div class="right__tableWrapper">
            <?PHP
            if (!empty($data)) {
            ?>
                <table>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID Product</th>
                            <th>Name Product</th>
                            <th>ID Product Detail</th>
                            <th>Lượt mua</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($data as $value) {         ?>
                            <tr>
                                <td><?PHP echo $i++ ?> </td>
                                <td><?php echo $value->idProduct ?></td>
                                <td><?php echo $value->nameProduct ?></td>
                                <td><?php echo $value->idProductDetail ?></td>
                                <td><?php echo $value->countSell?></td>
                            </tr>
                        <?php }
                    } else { ?>
                        <h1> Không có số liệu </h1>



                    <?PHP } ?>
                    </tbody>
                </table>
        </div>
    </div>
    </div>
</body>

</html>