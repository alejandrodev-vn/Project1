<?php

require_once("../model/function.php");
$db = new Database();
include_once("../core/app.php");
if(isset($_SESSION['username']) && $_SESSION['username ']!= '' ) { 
    $data = $_SESSION['username'];
    echo $data->idUser;
}

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'products':
            $table = $_GET['act'];
            $data_ctr = $db->getObject('category');
            $data_brand = $db->getObject('brand');
            $data = $db->getObject($table);
            $VIEW_NAME = '../view/admin/product/list.php';
            if (isset($_GET['delete'])) {
                $id = (int)$_GET['delete'];
                if ($db->delete($table, $id, 'idProduct')) {
                    $message = "Xoá thành công";
                } else $message = "Không thể thực hiện";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header("Refresh:0; url=?act=products");
            }
            if (isset($_GET['edit'])) {
                $id = (int)$_GET['edit'];
                $data = $db->getRowObject($table, $id, 'idProduct');
                $getName = $data->nameProduct;
                $VIEW_NAME = '../view/admin/product/edit.php';
                if (isset($_POST['update']) && ($_POST['update'])) {
                    $img = $db->save_file('imgUrl', $IMAGE_DIR);
                    $data = [
                        'nameProduct' => $_POST['nameProduct'],
                        'idCategory' => $_POST['idCategory'],
                        'idBrand' => $_POST['idBrand'],
                        'imgUrl' => $img,
                        'flashSale' => $_POST['flashSale'],
                        'note' => $_POST['note'],
                        'description' => $_POST['description']
                    ];
                    if ($db->update($table, $data, $id, 'idProduct'))
                        $message = "Cập nhật thành công";

                    else $message = "Không thể thực hiện";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    header("Refresh:0; url=?act=products");
                }
            }
            if (isset($_GET['new'])) {
                $VIEW_NAME = '../view/admin/product/new.php';
                if (isset($_POST['update']) && ($_POST['update'])) {
                    $img = $db->save_file('imgUrl', $IMAGE_DIR);
                    $data = [
                        'nameProduct' => $_POST['nameProduct'],
                        'idCategory' => $_POST['idCategory'],
                        'idBrand' => $_POST['idBrand'],
                        'imgUrl' => $img,
                        'flashSale' => $_POST['flashSale'],
                        'note' => $_POST['note'],
                        'description' => $_POST['description']
                    ];
                    if ($db->insert($table, $data))
                        $message = "Cập nhật thành công";
                    else $message = "Không thể thực hiện";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    header("Refresh:0; url=?act=products");
                }
            }
            if (isset($_GET['detail'])) {
                $id = (int)$_GET['detail'];
                $idPRD = (int)$_GET['detail'];
                $data = $db->getObjectSelect('productdetail', $id, 'idProduct');
                $VIEW_NAME = '../view/admin/product/detail.php';
            }
            if (isset($_GET['deleteDetail'])) {
                $id = (int)$_GET['deleteDetail'];
                $data_prd = $db->getRowObject('productdetail', $id, 'idProductDetail');
                $id_prd = $data_prd->idProduct;
                if ($db->delete('productdetail', $id, 'idProductDetail')) {
                    $message = "Xoá thành công";
                } else $message = "Không thể thực hiện";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header("Refresh:0; url=?act=products&detail=$id_prd");
            }
            if (isset($_GET['newDetail'])) {
                $id = (int)$_GET['newDetail'];
                $data_prd = $db->getRowObject($table, $id, 'idProduct');
                $VIEW_NAME = '../view/admin/product/newDetail.php';
                if (isset($_POST['update']) && ($_POST['update'])) {
                    if ($db->save_file('imgUrl', $IMAGE_DIR))
                        $img = $db->save_file('imgUrl', $IMAGE_DIR);
                    $data = [
                        'idProduct' => $id,
                        'color' => $_POST['color'],
                        'size' => $_POST['size'],
                        'price' => $_POST['price'],
                        'oldPrice' => $_POST['oldPrice'],
                        'imgUrl' => $img,
                        'quantity' => $_POST['quantity']
                    ];
                    if ($db->insert('productdetail', $data))
                        $message = "Cập nhật thành công";
                    else $message = "Không thể thực hiện";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    header("Refresh:0; url=?act=products&detail=$id");
                }
            }
            if (isset($_GET['editDetail'])) {
                $id = (int)$_GET['editDetail'];
                $data = $db->getRowObject('productdetail', $id, 'idProductDetail');
                $id_prd = $data->idProduct;
                $VIEW_NAME = '../view/admin/product/editDetail.php';
                if (isset($_POST['update']) && ($_POST['update'])) {
                    if ($db->save_file('imgUrl', $IMAGE_DIR))
                        $img = $db->save_file('imgUrl', $IMAGE_DIR);
                    $data = [
                        'color' => $_POST['color'],
                        'size' => $_POST['size'],
                        'price' => $_POST['price'],
                        'oldPrice' => $_POST['oldPrice'],
                        'imgUrl' => $img,
                        'quantity' => $_POST['quantity']
                    ];
                    if ($db->update('productdetail', $data, $id, 'idProductDetail'))
                        $message = "Cập nhật thành công";
                    else $message = "Không thể thực hiện";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    header("Refresh:0; url=?act=products&detail=$id_prd");
                }
            }
            break;
        case 'category':
            $table = $_GET['act'];
            $data = $db->getObject($table);
            $VIEW_NAME = '../view/admin/category/list.php';
            if (isset($_GET['delete'])) {
                $id = (int)$_GET['delete'];
                if ($db->delete($table, $id, 'idCategory')) {
                    $message = "Xoá thành công";
                } else $message = "Không thể thực hiện";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header("Refresh:0; url=?act=category");
            }
            if (isset($_GET['edit'])) {
                $id = (int)$_GET['edit'];
                $data = $db->getRowObject($table, $id, 'idCategory');
                $getName = $data->nameCategory;
                $VIEW_NAME = '../view/admin/category/edit.php';
                if (isset($_POST['update']) && ($_POST['update'])) {
                    $data = [
                        'nameCategory' => $_POST['nameCategory'],
                        'idGroupProduct' => $_POST['idGroupProduct']
                    ];
                    if ($db->update($table, $data, $id, 'idCategory'))
                        $message = "Cập nhật thành công";

                    else $message = "Không thể thực hiện";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    header("Refresh:0; url=?act=category");
                }
            }
            if (isset($_GET['new'])) {
                $VIEW_NAME = '../view/admin/category/new.php';
                if (isset($_POST['update']) && ($_POST['update'])) {
                    $data = [
                        'nameCategory' => $_POST['nameProduct'],
                        'nameGroupProduct' => $_POST['nameGroupProduct']
                    ];
                    if ($db->insert($table, $data))
                        $message = "Cập nhật thành công";
                    else $message = "Không thể thực hiện";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    header("Refresh:0; url=?act=category");
                }
            }
            break;
        case 'groupproduct':
            $table = $_GET['act'];
            $data = $db->getObject($table);
            $VIEW_NAME = '../view/admin/groupproduct/list.php';
            if (isset($_GET['delete'])) {
                $id = (int)$_GET['delete'];
                if ($db->delete($table, $id, 'idGroupProduct')) {
                    $message = "Xoá thành công";
                } else $message = "Không thể thực hiện";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header("Refresh:0; url=?act=groupproduct");
            }
            if (isset($_GET['edit'])) {
                $id = (int)$_GET['edit'];
                $data = $db->getRowObject($table, $id, 'idGroupProduct');
                $getName = $data->nameGroupProduct;
                $VIEW_NAME = '../view/admin/groupproduct/edit.php';
                if (isset($_POST['update']) && ($_POST['update'])) {
                    $data = [
                        'nameGroupProduct' => $_POST['nameGroupProduct'],

                    ];
                    if ($db->update($table, $data, $id, 'idGroupProduct'))
                        $message = "Cập nhật thành công";

                    else $message = "Không thể thực hiện";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    header("Refresh:0; url=?act=groupproduct");
                }
            }
            if (isset($_GET['new'])) {
                $VIEW_NAME = '../view/admin/groupproduct/new.php';
                if (isset($_POST['update']) && ($_POST['update'])) {
                    $data = [
                        'nameGroupProduct' => $_POST['nameGroupProduct']
                    ];
                    if ($db->insert($table, $data))
                        $message = "Cập nhật thành công";
                    else $message = "Không thể thực hiện";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    header("Refresh:0; url=?act=groupproduct");
                }
            }
            break;
        case 'brand':
            $table = $_GET['act'];
            $data = $db->getObject($table);
            $VIEW_NAME = '../view/admin/brand/list.php';
            if (isset($_GET['delete'])) {
                $id = (int)$_GET['delete'];
                if ($db->delete($table, $id, 'idThuongHieu')) {
                    $message = "Xoá thành công";
                } else $message = "Không thể thực hiện";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header("Refresh:0; url=?act=brand");
            }
            if (isset($_GET['edit'])) {
                $id = (int)$_GET['edit'];
                $data = $db->getRowObject($table, $id, 'idThuongHieu');
                $getName = $data->nameBrand;
                $VIEW_NAME = '../view/admin/brand/edit.php';
                if (isset($_POST['update']) && ($_POST['update'])) {
                    $data = [
                        'nameBrand' => $_POST['nameBrand'],

                    ];
                    if ($db->update($table, $data, $id, 'idThuongHieu'))
                        $message = "Cập nhật thành công";

                    else $message = "Không thể thực hiện";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    header("Refresh:0; url=?act=brand");
                }
            }
            if (isset($_GET['new'])) {
                $VIEW_NAME = '../view/admin/brand/new.php';
                if (isset($_POST['update']) && ($_POST['update'])) {
                    $data = [
                        'nameBrand' => $_POST['nameBrand']
                    ];
                    if ($db->insert($table, $data))
                        $message = "Cập nhật thành công";
                    else $message = "Không thể thực hiện";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    header("Refresh:0; url=?act=brand");
                }
            }
            break;
        case 'user':
            $table = $_GET['act'];
            $data_role = $db->getObject('role');
            $data = $db->getObject($table);
            $VIEW_NAME = '../view/admin/user/list.php';
            if (isset($_GET['delete'])) {
                $id = (int)$_GET['delete'];
                if ($db->delete($table, $id, 'idUser')) {
                    $message = "Xoá thành công";
                } else $message = "Không thể thực hiện";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header("Refresh:0; url=?act=user");
            }
            if (isset($_GET['edit'])) {
                $id = (int)$_GET['edit'];
                $data = $db->getRowObject($table, $id, 'idUser');
                $getName = $data->fullName;
                $VIEW_NAME = '../view/admin/user/edit.php';
                if (isset($_POST['update']) && ($_POST['update'])) {
                    $data = [
                        'idRole' => $_POST['idRole'],

                    ];
                    if ($db->update($table, $data, $id, 'idUser'))
                        $message = "Cập nhật thành công";

                    else $message = "Không thể thực hiện";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    header("Refresh:0; url=?act=user");
                }
            }
            break;
        case 'bill':
            $table = $_GET['act'];
            $data = $db->getObjectSelect($table,1,'status');
            $VIEW_NAME = '../view/admin/bill/list.php';
            if (isset($_GET['delete'])) {
                $id = (int)$_GET['delete'];
                if ($db->delete($table, $id, 'idBill')) {
                    $message = "Xoá thành công";
                } else $message = "Không thể thực hiện";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header("Refresh:0; url=?act=bill");
            }
            if (isset($_GET['deleteNoConfirm'])) {
                $id = (int)$_GET['deleteNoConfirm'];
                if ($db->delete($table, $id, 'idBill')) {
                    $message = "Xoá thành công";
                } else $message = "Không thể thực hiện";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header("Refresh:0; url=index.php");
            }
            if (isset($_GET['detail'])) {
                $id = (int)$_GET['detail'];
                $data = $db->getObjectSelect('billdetail', $id, 'idBill');
                $VIEW_NAME = '../view/admin/bill/detail.php';
            }
            if (isset($_GET['deleteDetail'])) {
                $id = (int)$_GET['deleteDetail'];
                if ($db->delete('billdetail', $id, 'idBillDetails')) {
                    $message = "Xoá thành công";
                } else $message = "Không thể thực hiện";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header("Refresh:0; url=?act=bill");
            }
            if (isset($_GET['confirm'])) {
                $id = (int)$_GET['confirm'];
                $data = [
                    'status' => '1'
                ];
                if ($db->update($table, $data, $id, 'idBill')) {
                    $message = "Cập nhật thành công";
                } else $message = "Cập nhật thành công";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header("Refresh:0; url=index.php");
            }

            break;
        case 'role': {
                $table = $_GET['act'];
                $data = $db->getObject($table);
                $VIEW_NAME = '../view/admin/role/list.php';
                if (isset($_GET['delete'])) {
                    $id = (int)$_GET['delete'];
                    if ($db->delete($table, $id, 'idRole')) {
                        $message = "Xoá thành công";
                    } else $message = "Không thể thực hiện";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    header("Refresh:0; url=?act=role");
                }
                if (isset($_GET['new'])) {
                    $VIEW_NAME = '../view/admin/role/new.php';
                    if (isset($_POST['update']) && ($_POST['update'])) {
                        $data = [
                            'level' => $_POST['level']
                        ];
                        if ($db->insert($table, $data))
                            $message = "Cập nhật thành công";
                        else $message = "Không thể thực hiện";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        header("Refresh:0; url=?act=role");
                    }
                }
            }
            break;
        case 'comment': {
                $table = $_GET['act'];
                $data = $db->getObject($table);
                $VIEW_NAME = '../view/admin/comment/list.php';
                if (isset($_GET['delete'])) {
                    $id = (int)$_GET['delete'];
                    if ($db->delete($table, $id, 'idComment')) {
                        $message = "Xoá thành công";
                    } else $message = "Không thể thực hiện";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    header("Refresh:0; url=?act=comment");
                }
                if (isset($_GET['confirm'])) {
                    $id = (int)$_GET['confirm'];
                    $data = [
                        'status' => '1'
                    ];
                    if ($db->update($table, $data, $id, 'idComment')) {
                        $message = "Cập nhật thành công";
                    } else $message = "Cập nhật thành công";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    header("Refresh:0; url=?act=comment");
                }
            }
            break;
            case 'rating': {
                $table = $_GET['act'];
                $data = $db->getObject($table);
                $VIEW_NAME = '../view/admin/rating/list.php';
                if (isset($_GET['delete'])) {
                    $id = (int)$_GET['delete'];
                    if ($db->delete($table, $id, 'idRating')) {
                        $message = "Xoá thành công";
                    } else $message = "Không thể thực hiện";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    header("Refresh:0; url=?act=rating");
                }
            }
        break;
        case 'topSelling': 
            { 
                $data = $db->getTopSelling();
                $VIEW_NAME='../view/admin/statistical/topSelling.php';
            }
        break;
        case 'lowQuantity': 
            { 
                $data = $db->getLowQuantity();
                $VIEW_NAME='../view/admin/statistical/lowQuantity.php';
            }
        break;
        case 'highQuantity': 
            { 
                $data = $db->getHighQuantity();
                $VIEW_NAME='../view/admin/statistical/HighQuantity.php';
            }
        break;
        case 'revenue': 
            { 
                $data = $db->getRevenueCurrentMonth();
                $VIEW_NAME='../view/admin/statistical/revenueCurrentMonth.php';
            }
        break;
        default:
            require '../view/admin/home/home.php';
            break;
    }
} else {
    $table = "bill";
    $data = $db->getObjectSelect($table,0,'status');
    $VIEW_NAME = '../view/admin/home/home.php';
}
include_once('../view/admin/layout.php');
