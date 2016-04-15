<div class="header-title" style="border-bottom: 1px solid #eee; margin-bottom: 20px;">
	<div class="container">
		<div class="row" style="width: 400px; display: inline-block;">
			<h1 class="page-title " style="text-decoration: underline;">
				<?php
					if (!\Fr\CU::segment(1)){
						echo 'Shop';
					}else{
						echo ucfirst(str_replace('-', ' ' ,$page));
					}
				?>
			</h1>
		</div>

		<div class="pull-right" style="margin-top: 30px; display: inline-block">
			<?php echo \Fr\BC::breadcrumbs($url); ?>
		</div>
	</div>
</div>