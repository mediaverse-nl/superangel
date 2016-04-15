<?php

$phpdate = strtotime( $user_info['geboortedatum'] );
$mysqldate = date( 'd-m-Y', $phpdate );

if(isset($_POST['submit'])){

    $vr = $_POST['voornaam'];
    $vl = $_POST['voorletter'];
    $an = $_POST['achternaam'];
    $ad = $_POST['straat'];
    $hn = $_POST['huisnummer'];
    $pc = $_POST['postcode'];
    $wp = $_POST['woonplaats'];
    $mb = $_POST['mobile'];
    $tf = $_POST['telefoon'];


    $user_id = \Fr\LS::getUser('id');

    \Fr\LS::updateUser( array(
        "voornaam"  => $vr,
        "voorletter"  => $vl,
        "achternaam"  => $an,
        "straat"  => $ad,
        "huisnummer"  => $hn,
        "postcode"  => $pc,
        "woonplaats"  => $wp,
        "mobile"  => $mb,
        "telefoon"  => $tf,
    ), $user_id);

    header('location: /mijn-gegevens/ ');

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
    <link href="/css/cssmenu.css" rel="stylesheet"/>

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
        <div class="col-lg-3">
            <!-- begin of side menu -->
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/include/account-menu.php'; ?>
            <!-- end of side menu -->
        </div>

        <div class="col-lg-9">

            <?php //echo $user_info; ?>

            <form action="<?php echo \Fr\LS::curPageURL(); ?>" method="post">
                <table class="formLayout userInfo" cellspacing="0" cellpadding="0" summary="Persoonlijke gegevens" style="margin-top:12px;">
                    <tbody>
                    <tr>
                        <td colspan="2">
                            <h4>Mijn persoonsgegevens</h4>
                        </td>
                    </tr>

                    <tr>
                        <th><span>Voornaam:</span></th>
                        <td><input class="form-control" type="text" value="<?php echo $user_info['voornaam']; ?>" name="voornaam"> </td>
                    </tr>
                    <tr>
                        <th><span>Voorletters:</span></th>
                        <td><input class="form-control" type="text" value="<?php echo $user_info['voorletter']; ?>" name="voorletter"> </td>
                    </tr>
                    <tr>
                        <th><span>Achternaam:</span></th>
                        <td><input class="form-control" type="text" value="<?php echo $user_info['achternaam']; ?>" name="achternaam"> </td>
                    </tr>
                    <tr>
                        <th><span>Geslacht:</span></th>
                        <td><input class="form-control" type="text" value="<?php echo $user_info['geslacht']; ?>" disabled> </td>
                    </tr>
                    <tr>
                        <th><span>Geboortedatum:</span></th>
                        <td><input class="form-control" type="text" value="<?php echo $mysqldate; ?>" disabled> </td>
                    </tr>
                    <tr>
                        <th><span>Adres:</span></th>
                        <td><input class="form-control" type="text" value="<?php echo $user_info['straat']; ?>" name="straat"> </td>
                    </tr>
                    <tr>
                        <th><span>Huisnummer:</span></th>
                        <td><input class="form-control" type="text" value="<?php echo $user_info['huisnummer']; ?>" name="huisnummer"> </td>
                    </tr>
                    <tr>
                        <th><span>Postcode:</span></th>
                        <td><input class="form-control" type="text" value="<?php echo $user_info['postcode']; ?>" name="postcode"> </td>
                    </tr>
                    <tr>
                        <th><span>Woonplaats:</span></th>
                        <td><input class="form-control" type="text" value="<?php echo $user_info['woonplaats']; ?>" name="woonplaats"> </td>
                    </tr>
                    <tr>
                        <th><span>Tel. mobiel:</span></th>
                        <td><input class="form-control" type="text" value="<?php echo $user_info['mobile']; ?>" name="mobile"> </td>
                    </tr>
                    <tr>
                        <th><span>Tel. thuis:</span></th>
                        <td><input class="form-control" type="text" value="<?php echo $user_info['telefoon']; ?>" name="telefoon"> </td>
                    </tr>
                    <tr>
                        <td><input class="btn btn-default" type="submit" name="submit" value="wijzigen" ><a class="btn btn-default" href="/mijn-gegevens/">terug</a></td>
                    </tr>
                    </tbody>
                </table>
            </form>

        </div>
    </div>

</div> <!-- /container -->

<!-- footer -->
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/footer.php'; ?>
<!-- /footer -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>

<script type="text/javascript">
    $('#cssmenu li.active').addClass('open').children('ul').show();
    $('#cssmenu li.has-sub>a').on('click', function(){
        $(this).removeAttr('href');
        var element = $(this).parent('li');
        if (element.hasClass('open')) {
            element.removeClass('open');
            element.find('li').removeClass('open');
            element.find('ul').slideUp(200);
        }
        else {
            element.addClass('open');
            element.children('ul').slideDown(200);
            element.siblings('li').children('ul').slideUp(200);
            element.siblings('li').removeClass('open');
            element.siblings('li').find('li').removeClass('open');
            element.siblings('li').find('ul').slideUp(200);
        }
    });
</script>

</body>

</html>s