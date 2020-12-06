<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Category <?= $getName ?> </h2>
        <!-- Trigger the modal with a button -->

        <div class="modal-body">
            <br><br><br>
            <form action="" method="post">
                <div class="form-group">
                    <label>ID Category :</label>
                    <?php echo $data->idCategory ?>
                </div>
                <div class="form-group">
                    <label> Name Category :</label>
                    <input type="text" name="nameCategory" class="form-control" value="<?= $data->nameCategory ?>">
                </div>
                <div class="form-group">
                    <label> Group Product :</label>
                    <input type="text" name="idGroupProduct" class="form-control" value="<?= $data->idGroupProduct ?>">
                </div>

                <input name="update" type="submit" value="Cập nhật" class="btn-submit">
            </form>

        </div>
    </div>



</body>

</html>