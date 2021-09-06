<?php include_once "template/header.php"; ?>
<?php include_once "template/menu.php"; ?>
<div class="row" style="width:98%;margin:2%;">
	<div class="col-lg-12">
		<div class="card"style="padding:15px">
			<div class="card-title"><h6>Add new payment</h6></div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-6">
								<label for="amount">Amount : </label>
							</div>
							<div class="col-lg-6">
								<input class="form-control" autocomplete="off" id="amount" type="numeric" min="0" step="0.1" value="">
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-6">
								<label for="date">Date : </label>
							</div>
							<div class="col-lg-6">
								<input class="form-control" id="date" type="date" value="">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-6">
								<label for="currency">Currency : </label>
							</div>
							<div class="col-lg-6">
								<select class="form-control" id="currency">
									<option value="MAD">MAD</option>
									<option value="USD">USD</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-6">
								<label for="warrently">Warrently : </label>
							</div>
							<div class="col-lg-6">
								<input class="form-control" id="warrently" style="width: auto;font-size: 3px;" type="checkbox" value="TRUE">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-6">
								<label for="type">Description : </label>
							</div>
							<div class="col-lg-6">
								<input class="form-control" id="type" type="text" value="">
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-6">
								<label for="target">Target :</label>
							</div>
							<div class="col-lg-6">
								<select id="target" class="form-control">
									<option value="bank">Bank</option>
									<option value="virtual">Virtual</option>
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
					<table id="gain" class="table table-striped table-bordered w-100 dt-responsive nowrap">
						<thead>
							<tr>
								<th>ID</th>
								<th>Amount</th>
								<th>Currency</th>
								<th>Warrently</th>
								<th>Target</th>
								<th>Description</th>
								<th>Date</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="js/gain.js?r=<?php echo rand(0,1100000000000); ?>"></script>
<?php include_once "template/footer.php"; ?>