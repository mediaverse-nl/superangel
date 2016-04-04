<?php

	\Fr\LS::init();
	if(!\Fr\LS::$loggedIn == true || !\Fr\LS::getUser('status') == 1){
		\Error\ES::GetResponsCode(403);
		exit;
	}

	if(isset($_GET['email'])){
		include $_SERVER['DOCUMENT_ROOT'] . '/libaries/productSystem/templates/read-mail.php';
		exit;
	}

	$html_contact = \Product\PS::getClientMessages();

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



		<div id="mailboxes">
			<?
			$pageauth['username'] = 'demo';
			$pageauth['password'] = 'demo123';


			// configure your imap mailboxes
			$mailboxes = array(
				array(
					'label' 	=> 'Gmail',
					'enable'	=> true,
					'mailbox' 	=> '{imap.gmail.com:993/imap/ssl}INBOX',
					'username' 	=> 'yourusername@gmail.com',
					'password' 	=> 'yourpassword'
				),
				array(
					'label' 	=> 'My Cpanel website',
					'enable'	=> true,
					'mailbox' 	=> '{mail.yourdomain.com:143/notls}INBOX',
					'username' 	=> 'info+yourdomain.com',
					'password' 	=> 'yourpassword'
				)
			);

			if ($pageauth['username'] && $pageauth['password']) {
				if(($_SERVER["PHP_AUTH_USER"]!==$pageauth['username']) || ( $_SERVER["PHP_AUTH_PW"]!==$pageauth['password'])){
					header("WWW-Authenticate: Basic realm=Protected area" );
					header("HTTP/1.0 401 Unauthorized");
					echo "Protected area";
					exit;
				}
			}

			foreach ($mailboxes as $current_mailbox) {
				?>
				<div class="mailbox">
					<h2><?=$current_mailbox['label']?></h2>
					<?
					// Open an IMAP stream to our mailbox
					$stream = @imap_open($current_mailbox['mailbox'], $current_mailbox['username'], $current_mailbox['password']);

					if (!$stream) {
						?>
						<p>Could not connect to: <?=$current_mailbox['label']?>. Error: <?=imap_last_error()?></p>
						<?
					} else {
						// Get our messages from the last week
						$emails = imap_search($stream, 'SINCE '. date('d-M-Y',strtotime("-1 week")));

						// Instead of searching for this week's messages, you could search
						// for all the messages in your inbox using: $emails = imap_search($stream, 'ALL');

						if (!count($emails)){
							?>
							<p>No e-mails found.</p>
							<?
						} else {

							// If we've got some email IDs, sort them from new to old and show them
							rsort($emails);

							foreach($emails as $email_id){

								// Fetch the email's overview and show subject, from and date.
								$overview = imap_fetch_overview($stream,$email_id,0);
								?>
								<div class="email_item clearfix <?=$overview[0]->seen?'read':'unread'?>"> <!-- add a different class for seperating read and unread e-mails -->
									<span class="subject"><?=$overview[0]->subject?></span>
									<span class="from"><?=$overview[0]->from?></span>
									<span class="date"><?=$overview[0]->date?></span>
								</div>
								<?
							}
						}

						// Close our imap stream.
						imap_close($stream);
					}
					?>
				</div>
				<?
			} // end foreach
			?>
		</div>


    	<div class="container">
			<div class="row">
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/admin-menu.php"; ?>

				<div class="col-lg-8">
					<div class="panel panel-red">
						<div class="panel-heading">
							Mijn orders
						</div>
						<div class="panel-body row">
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
										<tr>
											<th>#</th>
											<th>E-mail</th>
											<th>Datum / Tijd</th>
											<th>Onderwerp</th>
											<th>status</th>
										</tr>
										</thead>
										<tbody>

											<?php echo $html_contact; ?>

										</tbody>
									</table>
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