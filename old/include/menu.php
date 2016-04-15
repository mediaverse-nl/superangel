<nav class="navbar navbar-default navbar-fixed-top" style="height: 105px !important;">
	<div class="navbar" style="color: #eee; background: #384248; margin-bottom:0px !important;">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="/" class="navbar-brand">Logo</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">

				<ul class="nav navbar-nav navbar-right">
					<?php
						if(\Fr\LS::$loggedIn === true ){
							echo '
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Mijn Account <span class="caret"></span></a>
								<span style="font-size: smaller; position: absolute; margin: -17px 0px 0px 15px;">'.\Fr\LS::getUser('username').'</span>
								<ul class="dropdown-menu">	<li class="dropdown-header">Mijn Paneel</li>
									<li><a href="/mijn-bestellingen/">Mijn Bestellingen</a></li>
									<li><a href="/mijn-wenslijst/">Mijn Wenslijst</a></li>
									<li><a href="/mijn-gegevens/">Mijn Gegevens</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="/uitloggen/">Uitloggen</a></li>
								</ul>
							</li>';
						}else{
							echo '
							<li><a href="/registreren/">registreren</a></li>
							<li><a href="/inloggen/">inloggen</a></li>';
						}
					?>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<?php
						if(\Fr\LS::$loggedIn === true && \Fr\LS::getUser('status') == 1) {
							echo '
							<li class="">
								<a href="/dashboard/" role="button" aria-haspopup="true" aria-expanded="false"> Dashboard</a>
								<span style="font-size: smaller; position: absolute; margin: -17px 0px 0px 15px;">admin</span>
							</li>';
						}
					?>
				</ul>
			</div>
		</div>
	</div>

	<div class="container" style="height: 50px; border-color: #e7e7e7;">
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">

				<?php echo \Product\PS::GetMenuCate('li', 'kleding'); ?>

				<li class="navbar-right"><a href="/winkelwagen/"><?php //echo \Cart\SC::countTotalProducts(); ?> item(s) - &euro;<?php //echo \Cart\SC::getCartAmount()['cart']; ?><img style="height: 19px;" src="/img/logo/shopping-cart.png" /></a></li>
				<div class="nav navbar-nav col-lg-3 navbar-right">
					<form action="/shop<?php
					if( \Fr\CU::segment(2)){
						echo '/'.\Fr\CU::segment(2);
					}

					?>/" method="get">
						<div class="input-group stylish-input-group">
							<input type="text" name="s" class="form-control"  placeholder="Zoeken" >
							<span class="input-group-addon">
								<button type="submit">
									<span class="glyphicon glyphicon-search"></span>
								</button>
							</span>
						</div>
					</form>
				</div>
			</ul>
		</div>
	</div>
</nav>
