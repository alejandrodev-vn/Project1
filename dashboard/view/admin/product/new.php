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
        <h2> Thêm sản phẩm mới : </h2>
        <br><br><br>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name : </label>
                <input type="text" name="nameProduct" class="form-control" required value="">
            </div>
            <div class="form-group">
                <label> Category :</label>
                <select name="idCategory" class="form-control" value="">
                    <?PHP foreach ($data_ctr as $value) {  ?>
                        <option value="<?= $value->idCategory ?>"><?= $value->nameCategory ?></option>
                    <?PHP } ?>
                </select>
            </div>
            <div class="form-group">
                <label> Brand :</label>
                <select name="idBrand" class="form-control" value="">
                    <?PHP foreach ($data_brand as $value) {  ?>
                        <option value="<?= $value->idThuongHieu ?>"><?= $value->nameBrand?></option>
                    <?PHP } ?>
                </select>
            </div>
            <div class="form-group">
                <label>ImageUrl : </label>
                <input type="file" name="imgUrl" required value="">
            </div>
            <div class="form-group">
                <label>is Flash Sale : </label>
                <select name="flashSale" class="form-control" value="">
                        <option value="0">NO</option>
                        <option value="1">YES</option>

                </select>
            </div>
            <div class="form-group">
                <label>% discount : </label>
                <input type="text" name="note" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="description"> Description :</label> <textarea name="description" cols="30" rows="10"><?= $data->description ?></textarea>
            </div>

            <input name="update" type="submit" value="Thêm" class="btn-submit">
        </form>

    </div>

</body>

</html>