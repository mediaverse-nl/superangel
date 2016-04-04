<?php

    if(isset($_GET['edit'])){

        $value = htmlentities($_GET['edit']);

        if(isset($_POST['submit'])){

            $product_name = htmlspecialchars($_POST['name']);
            $product_desc = htmlspecialchars($_POST['desc']);
            $product_cate = htmlspecialchars($_POST['product-cate']);
            $product_price = htmlspecialchars($_POST['price']);

            \Product\PS::editProduct($value,
                $toUpdate = array(
                    'product_name' => $product_name,
                    'product_desc' => $product_desc,
                    'kleding' => $product_cate,
                    'product_price' => $product_price
                )
            );
        }

    }

    $result = \Product\PS::getProductDetails($value);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="/libaries/adminPanel/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/libaries/adminPanel/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/libaries/adminPanel/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/libaries/adminPanel/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            background: red;
            cursor: inherit;
            display: block;
        }
        input[readonly] {
            background-color: white !important;
            cursor: text !important;
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/libaries/adminPanel/include/dashboard-menu.php'; ?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">

                <?php include $_SERVER['DOCUMENT_ROOT'] . "/include/admin-menu.php"; ?>

                <div class="col-lg-12">
                    <h1 class="page-header">Blank</h1>
                </div>
                <!-- /.col-lg-12 -->

                <div class="col-lg-8">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            product toevoegen
                        </div>
                        <div class="panel-body">
                            <div class="panel-body">

                                <form role="form" action="<?php \Fr\LS::curPageURL(); ?>" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="email">Title</label>
                                        <input type="text" name="name" value="<?php echo  $result['product_name']; ?>" class="form-control" id="email">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Beschrijving</label>
                                        <textarea type="text" rows="8" name="desc" class="form-control" id="email"><?php echo  $result['product_desc']; ?></textarea>
                                    </div>

                                    <label>Afbeelding(en)</label>
                                    <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-primary btn-file">
                                        Browse… <input type="file" name="img[]" multiple>
                                    </span>
                                </span>
                                        <input type="text" class="form-control" readonly="">
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for="price">Prijs</label>
                                        <input type="text" name="price" value="<?php echo  $result['product_price']; ?>" class="form-control" id="price">
                                    </div>

                                    <label for="email">stoffen</label>
                                    <div class="form-group">

                                        <div style="display: inline-block; border: 1px solid #ccc;">
                                            <input type="checkbox">
                                            <img style="height: 45px; width: 45px; background-color: blueviolet;" src="">
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="email">categorieen</label>
                                        <select name="product-cate" class="form-control">
                                            <option value="<?php echo $result['kleding']; ?>" disabled><?php echo $result['kleding']; ?></option>
                                            <?php echo \Product\PS::GetMenuCate('option', 'kleding'); ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">categorieen</label>
                                        <select name="product-cate" class="form-control">
                                            <option value="<?php echo $result['merken']; ?>" disabled><?php echo $result['merken']; ?></option>
                                            <?php echo \Product\PS::GetMenuCate('option', 'merken'); ?>
                                        </select>
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-default">Aanpassen</button>
                                    <a href="/dashboard/producten/" style="color: #fff !important;" class="btn btn-danger">Annuleren</a>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="/libaries/adminPanel/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/libaries/adminPanel/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/libaries/adminPanel/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/libaries/adminPanel/dist/js/sb-admin-2.js"></script>


<script>
    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });

    $(document).ready( function() {
        $('.btn-file :file').on('fileselect', function(event, numFiles, label) {

            var input = $(this).parents('.input-group').find(':text'),
                log = numFiles > 1 ? numFiles + ' files selected' : label;

            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }

        });
    });

</script>

</body>

</html>