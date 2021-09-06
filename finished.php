<?php include_once "template/header.php"; ?>
<?php include_once "template/menu.php"; ?>
<div class="row" style="width:98%;margin:2%;">
	<div class="col-lg-12">
		<div class="row" style="margin-top:20px">
			<div class="col-lg-12">
				<div class="card" style="padding:10px;">
				<ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom:20px">
				  <li class="nav-item" role="presentation">
					<a class="nav-link btn btn-info" href="action">Return to do more tasks</a>
				  </li>
				</ul>
					<table id="action_done" class="table table-striped table-bordered w-100 dt-responsive nowrap">
						<thead>
							<tr>
								<th>ID</th>
								<th>Task</th>
								<th>Starting Time</th>
								<th>Priority</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="js/finished.js?r=<?php echo rand(0,1100000000000); ?>"></script>
<?php include_once "template/footer.php"; ?>