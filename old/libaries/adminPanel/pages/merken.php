<?php

    $result = \Product\PS::createNewCate();

    if(isset($_POST['submit'])){

        $value = $_POST['value'];
        $table = $_POST['table'];

        if(!empty($_POST['table']) && !empty($_POST['value'])){
           echo \Product\PS::createNewCate($table, $value );
        }
    }

?>

<html lang="en" hola_ext_inject="disabled">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/img/logo/favicon.ico">

    <title><?php echo \Fr\LS::$config['info']['company'].' - '.\Fr\CU::segment(1); ?> </title>

    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/product.css" rel="stylesheet"/>

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Static navbar menu -->
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/menu.php'; ?>
<!-- /Static navbar menu -->

<?php include $_SERVER['DOCUMENT_ROOT'].'/include/page-header.php'; ?>

<div class="container">
    <div class="row">

        <?php include $_SERVER['DOCUMENT_ROOT'] . "/include/admin-menu.php"; ?>

        <div class="col-lg-8">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    product toevoegen
                </div>
                <div class="panel-body">
                    <div class="panel-body">

                        <form role="form" action="<?php \Fr\LS::curPageURL(); ?>" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="sel1">Selecteer een categorie:</label>
                                <select class="form-control" id="sel1" name="table">
                                    <option>---</option>
                                    <?php

                                        $result = substr($result, 0, -1);
                                        $result = explode(",", $result);

                                        foreach($result as $key){
                                            echo '<option value="'.$key.'">'.$key.'</option>';
                                        }

                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="email">Naam van subcategorie:</label>
                                <input type="text" class="form-control" name="value" id="email">
                            </div>

                            <button type="submit" name="submit" class="btn btn-default">Toeveoegen</button>
                            <a href="/mijn-producten/" style="color: #fff !important;" class="btn btn-danger">Annuleren</a>

                        </form>

                    </div>
                </div>
            </div>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/include/notification-block.php'; ?>

    </div>

</div> <!-- /container -->

<!-- footer -->
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/footer.php'; ?>
<!-- /footer -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>

</body>

</html>