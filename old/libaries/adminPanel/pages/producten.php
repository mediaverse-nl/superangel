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

                <!-- Navigation -->

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Producten
                            </h1>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <?php include $_SERVER['DOCUMENT_ROOT'] . '/include/admin-menu.php'; ?>
                    </div>
                    <!-- /.row -->

                    <div class="row">

                        <div class="col-lg-8">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    Product paneel
                                </div>
                                <div class="panel-body">
                                    <div class="panel-body row">

                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Naam</th>
                                                    <th>Maat</th>
                                                    <th>Voorraad</th>
                                                    <th>Datum</th>
                                                    <th>Product Nr.</th>
                                                    <th>Prijs</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php echo \Product\PS::showAllProducts(); ?>
                                                </tbody>
                                            </table>
                                            <div class="col-lg-3 row">
                                                <a href="/mijn-producten/toevoegen/" class="btn btn-default ">toevoegen</a>
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- /.table-responsive -->

                                        <div class="col-lg-12">
                                            <div class="panel panel-default row">
                                                <div class="panel-heading">
                                                    Product opties
                                                </div>
                                                <div class="panel-body row">

                                                    <div class="col-lg-3">
                                                        <a href="/mijn-producten/subcategorie-toevoegen/" class="btn btn-submit">subcategorie toevoegen</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
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

</body>

</html>