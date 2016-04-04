<?php

  $arr = '';

  if(isset($_POST['change_password'])){
    if(isset($_POST['current_password']) && $_POST['current_password'] != "" &&
        isset($_POST['new_password']) && $_POST['new_password'] != "" &&
        isset($_POST['retype_password']) && $_POST['retype_password'] != "" &&
        isset($_POST['current_password']) && $_POST['current_password'] != ""){

      $curpass = $_POST['current_password'];
      $new_password = $_POST['new_password'];
      $retype_password = $_POST['retype_password'];

      if($new_password != $retype_password){
        $arr = "<p><h2>Het wachtwoord komt niet overeen</h2><p>De ingevoerde wachtwoorden komen niet overeen. Probeer het nog eens.</p></p>";
      }else if(\Fr\LS::login(\Fr\LS::getUser("username"), "", false, false) == false){
        $arr = "<h2>Huidig ??wachtwoord is fout!</h2><p>Het ingevoerde wachtwoord voor uw account is verkeerd.</p>";
      }else{
        $change_password = \Fr\LS::changePassword($curpass, $new_password);
        if($change_password === true){
          $arr = "<h2>Wachtwoord succesvol veranderd</h2>";
        }
      }
    }else{
      $arr = "<p><h2>Wachtwoord Fields was leeg</h2><p>Velden werden leeg gelaten</p></p>";
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

      <?php echo $arr; ?>

      <form action="<?php echo \Fr\LS::curPageURL();?>" method='POST'>

        <table class="userInfo" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <td colspan="2">
                <h4>mijn accountgegevens</h4>
              </td>
            </tr>
            <tr>
              <th><span>E-mailadres:</span></th>
              <td><input class="form-control" type="text" value="<?php echo $user_info['email']; ?>" disabled></td>
            </tr>
            <tr>
              <th><span>Huidig wachtwoord:</span></th>
              <td><input class="form-control" type="password" name="current_password" ></td>
            </tr>
            <tr>
              <th><span>Wachtwoord:</span></th>
              <td><input class="form-control" type="password" name="new_password" ></td>
            </tr>
            <tr>
              <th><span>Herhaal wachtwoord:</span></th>
              <td><input class="form-control" type="password" name="retype_password" ></td>
            </tr>
            <tr>
              <td></td>
              <td><input class="btn btn-default" type="submit" name="change_password" value="wijzigen" ><a class="btn btn-default" href="/mijn-gegevens/">terug</a></td>
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

</html>
