<div class="col-lg-4">
	<div class="panel panel-default">
		<div class="panel-heading">
			<i class="fa fa-bell fa-fw"></i> Notificatiepaneel
		</div>
		<!-- /.panel-heading -->
		<div class="panel-body">
			<div class="list-group">

				<?php echo \Product\PS::getNotifications(); ?>

			</div>
			<!-- /.list-group -->
			<a href="#" class="btn btn-default btn-block">View All Alerts</a>
		</div>
		<!-- /.panel-body -->
	</div>
</div>