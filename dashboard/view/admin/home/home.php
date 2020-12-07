<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="right__table">
        <p class="right__tableTitle">List Category</p>
        <div class="right__tableWrapper">
            <?PHP
            if (!empty($data)) {
            ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID Bill</th>
                            <th>id User</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Del</th>
                            <th>Detail</th>
                            <th>Confirm</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        foreach ($data as $value) {         ?>
                            <tr>
                                <td><?php echo $value->idBill ?></td>
                                <td><?php echo $value->idUser ?></td>
                                <td><?php echo $value->total ?></td>
                                <td><?php echo $value->date ?></td>
                                <td><?php echo $value->status ?></td>
                                <td class="text-center">
                                    <a href="?act=bill&deleteNoConfirm=<?PHP echo $value->idBill ?>" class="btn-edit">Del</a>
                                </td>
                                <td>
                                    <a href="?act=bill&detail=<?PHP echo $value->idBill ?>" class="btn-edit">Detail</a>
                                </td>
                                <td>
                                    <a href="?act=bill&confirm=<?PHP echo $value->idBill ?>" class="btn-edit">Confirm</a>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <h1> Không có đơn hàng mới </h1>



                    <?PHP } ?>
                    </tbody>
                </table>
        </div>
        <a href="?act=bill" class="right__tableMore">
            <p>Xem tất cả các đơn đặt hàng</p> <img src="../public/assets/arrow-right-black.svg" alt="">
        </a>
    </div>
</body>

</html>