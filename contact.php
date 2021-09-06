<?php include_once "template/header.php"; ?>
<?php include_once "template/menu.php"; ?>
<div class="row" style="width:98%;margin:2%;">
	<div class="col-lg-12">
		<div class="card"style="padding:15px">
			<div class="card-title"><h6>Add new Contact</h6></div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-6">
								<label for="name">Name : </label>
							</div>
							<div class="col-lg-6">
								<input class="form-control" autocomplete="off" id="name" type="text">
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-6">
								<label for="contact">Contact : </label>
							</div>
							<div class="col-lg-6">
								<input class="form-control" autocomplete="off" id="contact" type="text">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-6">
								<label for="contactType">Contact Type :</label>
							</div>
							<div class="col-lg-6">
								<select id="contactType" class="form-control">
									<option value="Phone Number">Phone Number</option>
                                    <option value="Email">Email</option>
									<option value="Skype">Skype</option>
									<option value="Telegram">Telegram</option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="Instagram">Instagram</option>
                                    <option value="Other">Other</option>
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
					<table id="contactTable" class="table table-striped table-bordered w-100 dt-responsive nowrap">
						<thead>
							<tr>
                                <th>ID</th>
								<th>Name</th>
								<th>Contact</th>
								<th>Contact Type</th>
                                <th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="js/contact.js?r=<?php echo rand(0,1100000000000); ?>"></script>
<?php include_once "template/footer.php"; ?>