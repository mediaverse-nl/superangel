<?php


if(!isset($_GET['email'])){
    header('location: /mijn-klantenservice/');
}

//get id of mail
$email_id = htmlentities($_GET['email']);

$result = \Product\PS::getSingleMail($email_id);



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
    <link href="" rel="stylesheet"/>

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
            <div class="panel panel-red">
                <div class="panel-heading">
                    Mijn bericht
                </div>
                <div class="panel-body row">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="form-group">
                                <label>Naam:</label>
                                <p><?php echo $result['c_name']; ?></p>
                            </div>
                            <div class="form-group">
                                <label>E-mail:</label>
                                <p><?php echo $result['c_email']; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Onderwerp:</label>
                                <p><?php echo $result['c_subject']; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Bericht:</label>
                                <p><?php echo $result['c_message']; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Tijd / Datum:</label>
                                <p><?php echo $result['c_date_time']; ?></p>
                            </div>

                        </div>
                        <!-- /.table-responsive -->
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