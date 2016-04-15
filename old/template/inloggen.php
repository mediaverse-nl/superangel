<?php

    if(\Fr\LS::$loggedIn === true){
        echo('je bent al ingelogd! klik <a href="/home">hier</a> om terug te keren.');
        exit;
    }else{
        if(isset($_POST['action_login'])){
            $identification = $_POST['login'];
            $password = $_POST['password'];
            if($identification == "" || $password == ""){
                $msg = array("Error", "Username / Password Wrong !");
            }else{
                $login = \Fr\LS::login($identification, $password, isset($_POST['remember_me']));
                if($login === false){
                    $msg = array("Error", "Username / Password Wrong !");
                }else if(is_array($login) && $login['status'] == "blocked"){
                    $msg = array("Error", "Too many login attempts. You can attempt login after ". $login['minutes'] ." minutes (". $login['seconds'] ." seconds)");
                }if($login === true){
                    header('location: /shop/ ');
                }
            }
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
    <link href="/css/inloggen.css" rel="stylesheet"/>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Static navbar menu -->
    <?php include $_SERVER['DOCUMENT_ROOT'].'/include/menu.php'; ?>
    <!-- /Static navbar menu -->

    <div class="header-title">
        <div class="container">
            <h1 class="page-title">Inloggen</h1>
        </div>
    </div>

    <div class="container">

        <?php
        if(isset($msg)){
          echo "<h2>{$msg[0]}</h2><p>{$msg[1]}</p>";
        }
        ?>

        <br>
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-login">
                    <br>
                    <form action="/inloggen/" method="POST" style="margin:0px auto;display:table;">
                        <div class="form-group">
                            <p>Gebruikersnaam / E-mail</p>
                            <input type="text" name="login" id="username" tabindex="1" class="form-control" placeholder="" value="">
                            <br>
                            <p>Wachtwoord</p>
                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="action_login" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                        </div>
                        <div class="text-center">
                            <input type="checkbox" name="remember_me" /> <label for="remember">Gegevens onthouden</label>
                            <br>
                            <br>
                        </div>
                        <div class="option-panel">

                            <div class="col-lg-6 register">
                                <p>Nog geen account?</p>
                                <a class="button" href="/registreren/">registreren</a>
                            </div>
                            <div class="col-lg-6">
                                <p>Wachtwoord vergeten?</p>
                                <a class="button" href="/herstel-account/">herstel account</a>
                            </div>
                        </div>

                    </form>

                </div>



            </div>
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
