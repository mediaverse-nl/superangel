<footer>
	<div class="container" style="margin-top: 50px;">
		<div class="col-lg-3 col-md-3 col-sm-6">
			<div class="column">
				<h4>Informatie</h4>
				<ul>
					<li><a href="/over-ons/">&rsaquo; Over Ons</a></li>
					<li><a href="/privacy-verklaring/">&rsaquo; Privacy Verklaring</a></li>
					<li><a href="/algemene-voorwaarden/">&rsaquo; Algemene Voorwaarden</a></li>
					<li><a href="/verzending/">&rsaquo; Verzend Methode</a></li>
					<li><a href="/sitemap/">&rsaquo; Sitemap</a></li>
					<li><a href="/faq/">&rsaquo; FAQ</a></li>
				</ul>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6">
			<div class="column">
				<h4>Categorieën</h4>
				<ul>
					<?php echo \Product\PS::GetMenuCate('li', 'kleding'); ?>
				</ul>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6">
			<div class="column">
				<h4>Klantenservice</h4>
				<ul>
					<li><a href="/contact/">&rsaquo; Contact</a></li>
					<li><a href="mailto:contact@superangel.nl">E-mail: contact@superangel.nl</a></li>
					<li><a> Tel: +31622766214</a></li>
					<br>
					<li>Adresgegevens</li>
					<li><a>Leenderweg 74b</a></li>
					<li><a>Eindhoven 5615 AB </a></li>
					<br>
					<li>Bedrijfsgegevens</li>
					<li><a>IBAN nummer: NL142134570B01</a></li>
					<li><a>KVK nummer: 17161320</a></li>
					<br>
				</ul>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6">
			<div class="column">
				<h4>Volg Ons</h4>
				<ul class="social">
					<li style="display: inline-block; margin: 5px"><a style="height: 50px;" target="_blank" href="https://www.facebook.com/Biggirlz/?fref=ts"><img style="height: 50px;" src="/img/logo/rss.png"></a></li>
					<li style="display: inline-block; margin: 5px"><a style="height: 50px;" target="_blank" href="https://www.facebook.com/Biggirlz/?fref=ts"><img style="height: 50px;" src="/img/logo/googleplus.png"></a></li>
					<li style="display: inline-block; margin: 5px"><a style="height: 50px;" target="_blank" href="https://www.facebook.com/Biggirlz/?fref=ts"><img style="height: 50px;" src="/img/logo/facebook500.png"></a></li>
					<li style="display: inline-block; margin: 5px"><a style="height: 50px;" target="_blank" href="https://www.facebook.com/Biggirlz/?fref=ts"><img style="height: 50px;" src="/img/logo/twitter.png"></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="navbar-inverse text-center copyright">
		Designed and built by <a style="color: #C0101A;" href="//www.mediaverse.nl">Mediaverse</a> / Copyright © <?php \Fr\LS::auto_copyright(); ?> All right reserved
	</div>
</footer>