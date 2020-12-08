<!DOCTYPE html>
<html lang="en">

<head>
    <title> Thêm Sản phẩm mới</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2> Add new Category : </h2>
<br><br><br>
        <form action="" method="post">
            <div class="form-group">
                <label>Name : </label>
                <input type="text" name="nameProduct" class="form-control" value="">
            </div>
            <div class="form-group">
                <label> Group :</label>
                <select name="idGroupProduct" class="form-control" value="">
                    <?PHP foreach ($data_group as $value) {  ?>
                        <option value="<?= $value->idGroupProduct ?>"><?= $value->nameGroupProduct ?></option>
                    <?PHP } ?>
                </select>
            </div>

            <input name="update" type="submit" value="Thêm" class="btn-submit">
        </form>

    </div>

</body>

</html>