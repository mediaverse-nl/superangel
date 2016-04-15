<?php

    if(isset($_POST['submit'])){

        if( !empty($_POST['name']) && !empty($_POST['desc']) && !empty($_POST['product-cate']) && !empty($_POST['price']) && !empty($_POST['maten']) ){

            $product_name = htmlentities($_POST['name']);
            $product_desc = htmlentities($_POST['desc']);
            $product_cate = htmlentities($_POST['product-cate']);
            $product_price = htmlentities($_POST['price']);
            $product_brands = htmlentities($_POST['product-brands']);
            $product_color = htmlentities($_POST['product-color']);

            //genarate product number
            $product_code = '';
            $chars = "0123456789";
            $size = strlen($chars) - 1;
            for($i = 0;$i < 6;$i++) {
                $product_code .= $chars[rand(0, $size)];
            }

            //array
            $maten = $_POST['maten'];

            $array = \Product\PS::imgUpload();

            if($array ){

            }

            for($i=0; $i < count($maten); $i++) {

                $product_id = \Product\PS::insertProduct(array(
                    'product_code' => $product_code,
                    'product_name' => $product_name,
                    'product_desc' => $product_desc,
                    'kleding' => $product_cate,
                    'merken' => $product_brands,
                    'kleuren' => $product_color,
                    'maten' => $maten[$i],
                    'product_price' => $product_price
                ));

                \Product\PS::imgPathToDataBase($array, $product_id);

            }

            \Product\PS::product_facts(true);

        }


    }

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
                <div class="col-lg-12">
                    <h1 class="page-header">product toevoegen</h1>
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

                                    <!--  -->
                                    <div class="form-group">
                                        <label for="email">Product Naam</label>
                                        <input type="text" class="form-control" name="name" id="email">
                                    </div>

                                    <!--  -->
                                    <div class="form-group">
                                        <label for="email">Product Beschrijving</label>
                                        <textarea type="text" name="desc" class="form-control" id="email"></textarea>
                                    </div>

                                    <!--  -->
                                    <label>Product Afbeelding(en)</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                Browse&hellip; <input type="file" name="img[]" multiple>
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" readonly>
                                    </div>

                                    <br>

                                    <!--  -->
                                    <div class="form-group">
                                        <label for="email">Prijs</label>
                                        <input type="text" name="price" class="form-control">
                                    </div>

                                    <!--  -->
                                    <label for="email">Kleuren</label>
                                    <div class="form-group">
                                        <div style="display: inline-block; border: 1px solid #ccc;">
                                            <input type="checkbox" name="product-color" value="">
                                            <img style="height: 45px; width: 45px; background-color: blueviolet;" src="">
                                        </div>
                                    </div>


                                    <!-- 1 add color to database-->
                                    <!-- 2 fetch colors from database-->
                                    <!-- echo -->

                                    <?php //\Product\PS::getColors(); ?>


                                    <!-- kleding categorieën-->
                                    <div class="form-group">
                                        <label for="email">kleding categorieën</label>
                                        <select name="product-cate" class="form-control">
                                            <option>---</option>
                                            <?php echo \Product\PS::GetMenuCate('option', 'kleding'); ?>
                                        </select>
                                    </div>

                                    <!--  -->
                                    <div class="form-group">
                                        <label for="maten">maten</label><br>
                                        <?php echo \Product\PS::GetMenuCate('checkbox', 'maten'); ?>
                                    </div>

                                    <!--  -->
                                    <div class="form-group">
                                        <label for="email">Merken</label>
                                        <select name="product-brands" class="form-control">
                                            <option>---</option>
                                            <?php echo \Product\PS::GetMenuCate('option', 'merken'); ?>
                                        </select>
                                    </div>

                                    <!--  -->
                                    <div class="form-group">
                                        <label for="email">status</label>
                                        <div class="radio">
                                            <label><input type="radio" name="product_status" value="NULL">Offline</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="product_status" value="1">Online</label>
                                        </div>
                                    </div>

                                    <hr>

                                    <button type="submit" name="submit" class="btn btn-default">Toeveoegen</button>
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

<label>Product Afbeelding(en)</label>
<div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                Browse&hellip; <input type="file" name="img[]" multiple>
                                            </span>
                                        </span>
    <input type="text" class="form-control" readonly>
</div>

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



