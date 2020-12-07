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
        <p class="right__tableTitle">Danh sách sản phẩm</p>
        <div class="right__tableWrapper">
            <?PHP
            if (!empty($data)) {
            ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID User</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Date of Birth</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>idRole</th>
                            <th>Xoá</th>
                            <th>Edit</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        foreach ($data as $value) {         ?>
                            <tr>
                                <td><?php echo $value->idUser ?></td>
                                <td><?php echo $value->fullName ?></td>
                                <td><?php echo $value->email ?></td>
                                <td><?php echo $value->address ?></td>
                                <td><?php echo $value->phoneNumber ?></td>
                                <td><?php echo $value->dateOfBirth ?></td>
                                <td><?php echo $value->username ?></td>
                                <td><?php echo $value->password ?></td>
                                <td><?php echo $value->idRole ?></td>
                                <td class="text-center">
                                    <a href="?act=user&delete=<?PHP echo $value->idUser ?>" class="btn-edit">Del</a>
                                </td>
                                <td>
                                    <a href="?act=user&edit=<?PHP echo $value->idUser ?>" class="btn-edit">Edit</a>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <h1> Hiện không có dữ liệu trong bảng</h1>



                    <?PHP } ?>
                    </tbody>
                </table>
        </div>
    </div>
</body>

</html>