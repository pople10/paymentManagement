<?php include_once "template/header.php"; ?>
<?php include_once "template/menu.php"; ?>
<!-- Balances -->
<div class="row" style="width:100%;">
	<div class="col-sm-4">
		<div class="card marginside">
			<div class="card-body">
				<div class="card-title"><h5 class="display-4">Bank Balance<h5></div>
				<div class="card-text">
					<div class="d-flex flex-row" style="margin-top: 40px!important;">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-money mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="bankmad" class="mt-0"></h5>
                                <p class="mb-0 text-muted">MAD <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="card marginside">
			<div class="card-body">
				<div class="card-title"><h5 class="display-4">Virtual Balance<h5></div>
				<div class="card-text">
					<div class="d-flex flex-row" style="margin-top: 40px!important;">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-money mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="virtualusd" class="mt-0"></h5>
                                <p class="mb-0 text-muted">USD <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="card marginside">
			<div class="card-body">
				<div class="card-title"><h5 class="display-4">Pending<h5></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-money mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="pendingmad" class="mt-0"></h5>
                                <p class="mb-0 text-muted">MAD <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-money mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="pendingusd" class="mt-0"></h5>
                                <p class="mb-0 text-muted">USD <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Graph -->
<div class="row" style="width:100%;">
	<div class="col-lg-6">
		<div class="card marginside1">
			<div class="card-title"><h6>Payment received in MAD</h6></div>
			<div class="card-body">
				<canvas id="annualGainMAD" width="200" height="200" style="background-color:white;"></canvas>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card marginside1">
			<div class="card-title"><h6>Payment received in USD</h6></div>
			<div class="card-body">
				<canvas id="annualGainUSD" width="200" height="200" style="background-color:white;"></canvas>
			</div>
		</div>
	</div>
</div>
<div class="row" style="width:100%;">
	<div class="col-lg-6">
		<div class="card marginside1">
			<div class="card-title"><h6>Payment sent in MAD</h6></div>
			<div class="card-body">
				<canvas id="annualLoseMAD" width="200" height="200" style="background-color:white;"></canvas>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card marginside1">
			<div class="card-title"><h6>Payment sent in USD</h6></div>
			<div class="card-body">
				<canvas id="annualLoseUSD" width="200" height="200" style="background-color:white;"></canvas>
			</div>
		</div>
	</div>
</div>
<div class="row" style="width:100%;">
	<div class="col-lg-6">
		<div class="card marginside1">
			<div class="card-title"><h6>Payment in MAD</h6></div>
			<div class="card-body">
				<canvas id="annualTotalMAD" width="200" height="200" style="background-color:white;"></canvas>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card marginside1">
			<div class="card-title"><h6>Payment in USD</h6></div>
			<div class="card-body">
				<canvas id="annualTotalUSD" width="200" height="200" style="background-color:white;"></canvas>
			</div>
		</div>
	</div>
</div>
<!-- Years -->
<div class="row" style="width:100%;">
	<div class="col-lg-6">
		<div class="card marginside1">
			<div class="card-title"><h6>Payment received in MAD</h6></div>
			<div class="card-body">
				<div><canvas id="1" width="200" height="200" style="background-color:white;"></canvas></div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card marginside1">
			<div class="card-title"><h6>Payment received in USD</h6></div>
			<div class="card-body">
				<div><canvas id="2" width="200" height="200" style="background-color:white;"></canvas></div>
			</div>
		</div>
	</div>
</div>
<div class="row" style="width:100%;">
	<div class="col-lg-6">
		<div class="card marginside1">
			<div class="card-title"><h6>Payment sent in MAD</h6></div>
			<div class="card-body">
				<canvas id="4" width="200" height="200" style="background-color:white;"></canvas>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card marginside1">
			<div class="card-title"><h6>Payment sent in USD</h6></div>
			<div class="card-body">
				<canvas id="3" width="200" height="200" style="background-color:white;"></canvas>
			</div>
		</div>
	</div>
</div>
<script src="js/balance.js?r=<?php echo rand(0,1100000000000); ?>"></script>
<?php include_once "template/footer.php"; ?>