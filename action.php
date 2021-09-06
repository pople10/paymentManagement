<?php include_once "template/header.php"; ?>
<?php include_once "template/menu.php"; ?>
<div class="row" style="width:98%;margin:2%;">
	<div class="col-lg-12">
		<div class="card"style="padding:15px">
			<div class="card-title"><h6>Add new Action</h6></div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-6">
								<label for="task">Task : </label>
							</div>
							<div class="col-lg-6">
								<input class="form-control" autocomplete="off" id="task" type="text">
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-6">
								<label for="time">Time : </label>
							</div>
							<div class="col-lg-6">
								<input class="form-control" id="time" type="datetime-local" value="">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-6">
								<label for="priority">Priority :</label>
							</div>
							<div class="col-lg-6">
								<select id="priority" class="form-control">
									<option value="3">High</option>
									<option value="2">Medium</option>
									<option value="1">Low</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
							<center>
								<button class="btn btn-success" N="add" id="submit">Add</button>
								<button class="btn btn-warning" style="display:none;" id="annuler">Cancel</button>
							</center>
					</div>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top:20px">
			<div class="col-lg-12">
				<div class="card" style="padding:10px;">
				<ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom:20px">
				  <li class="nav-item" role="presentation">
					<a class="nav-link btn btn-info" href="finishedTasks">Check what you did before ! </a>
				  </li>
				</ul>
					<table id="action" class="table table-striped table-bordered w-100 dt-responsive nowrap">
						<thead>
							<tr>
								<th>ID</th>
								<th>Task</th>
								<th>Starting Time</th>
								<th>Priority</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal" id="confirmationmodal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
        <button type="button" class="close closeused" data-dismiss=".modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Would you really like to mark the task as completed?
      </div>
      <div class="modal-footer">
		<button type="button" id="completetask" class="btn btn-danger">Complete</button>
        <button type="button" class="btn btn-secondary closeused" data-dismiss=".modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script src="js/action.js?r=<?php echo rand(0,1100000000000); ?>"></script>
<?php include_once "template/footer.php"; ?>