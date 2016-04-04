<?php

if( isset($_POST['submit']) ){

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['pass'];
  $retyped_password = $_POST['retyped_password'];
  $name = $_POST['name'];

  $message = '<html><body>';
  $message .= '<img src="" alt="Website Change Request" />';
  $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
  $message .= "<tr style='background: #eee;'><td><strong>Naam:</strong> </td><td> ".$name."  </td></tr>";
  $message .= "<tr><td><strong>Gebruikersnaam:</strong> </td><td> ".$username."  </td></tr>";
  $message .= "<tr><td><strong>Email:</strong> </td><td> ".$email."  </td></tr>";
  $message .= "<tr><td><strong>Wachtwoord:</strong> </td><td> ".$password." </td></tr>";
  $message .= "</table>";
  $message .= "</body></html>";

  if( $username != "" || $email != "" || $password != '' || $retyped_password != '' || $name != '' ){

    $createAccount = \Fr\LS::register($username, $password,
        array(
            "email" => $email,
            "name" => $name,
            "created" => date("Y-m-d H:i:s") // Just for testing
        )
    );
    if($createAccount === "existsEmail"){
      $userErr = '<div class="alert alert-danger">
                    <ul class="list-unstyled">
                      <li style="color: #a94442;">Het opgegeven E-mailadres is al gebruikt.</li>
                    </ul>
                  </div>';
    }elseif($createAccount === "existsUsername"){
      $userErr = '<div class="alert alert-danger">
                    <li class="list-unstyled">
                      <li style="color: #a94442;">Het opgegeven gebruikersnaam is al gebruikt.</li>
                    </ul>
                  </div>';
    }elseif($createAccount === true){
      $userErr = '<div class="alert alert-success">
                    <ul class="list-unstyled">
                      <li>Uw account is aangemaakt. klik <a href="/inloggen/">hier</a> om in te loggen.</li>
                    </ul>
                  </div>';
      \Fr\LS::sendMail($email, 'registratie', $message);
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

  <form class="col-lg-6" id="form" data-toggle="validator" role="form" novalidate="true" action="<?php echo \Fr\LS::curPageURL(); ?>" method="post">

    <?php
      if(isset($userErr)){
        echo $userErr;
      }
    ?>

    <div class="form-group">
      <label for="inputName" class="control-label">Naam</label>
      <input type="text" class="form-control" name="name" id="inputName" data-error="Vul dit in." required="">
      <div class="help-block with-errors"></div>
    </div>

    <div class="form-group">
      <label for="inputName" class="control-label">Gebruikersnaam</label>
      <input type="text" class="form-control" name="username" id="inputName" data-error="Vul dit in." required="">
      <div class="help-block with-errors"></div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="control-label">E-mail</label>
      <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" data-error="E-mailadres is ongeldig" required="">
      <div class="help-block with-errors"></div>
    </div>

    <div class="form-group">
      <label for="inputPassword" class="control-label">Wachtwoord</label>
      <div class="form-inline row">
        <div class="form-group col-lg-6 ">
          <input type="password" data-toggle="validator" name="pass" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required="">
          <span class="help-block">Minstens 6 tekens</span>
        </div>
        <div class="form-group col-lg-6">
          <input type="password" class="form-control" name="retyped_password" id="inputPasswordConfirm" data-match="#inputPassword" data-error="Wachtwoord komt niet overeen." placeholder="Herhaal" required="">
          <div class="help-block with-errors"></div>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="checkbox">
        <label>
          <input type="checkbox" id="terms" data-error="Ga akkoord met de algemene voorwaarden." required="">
           Gaat u akkoord met de <a href="/algemene-voorwaarden/">algemene Voorwaarden</a> van <?php echo \Fr\LS::$config['info']['company']; ?>
        </label>
        <div class="help-block with-errors"></div>
      </div>
    </div>

    <div class="form-group">
      <button type="submit" name="submit" class="btn btn-primary disabled">Submit</button>
    </div>

  </form>

</div> <!-- /container -->

<!-- footer -->
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/footer.php'; ?>
<!-- /footer -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="/js/bootstrap-validator-master/dist/validator.js"></script>

<script>
  $('#form').validator().on('submit', function (e) {
    if (e.isDefaultPrevented()) {
      // handle the invalid form...
    } else {
      // everything looks good!
    }
</script>

</body>

</html>
