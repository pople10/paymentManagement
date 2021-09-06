<?php include_once "template/header.php"; ?>
<?php include_once "template/menu.php"; ?>
<div class="row" style="width:100%;">
	<div class="col-lg-12">
		<div class="card marginside1">
			<div class="card-title"><h6>Search<h6></div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-2">
						<label for="type">Description :</label>
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="type">
					</div>
					<div class="col-sm-2">
						<label for="table">Option :</label>
					</div>
					<div class="col-sm-3">
						<select id="table" class="form-control">
							<option value="gain">Payment Received</option>
							<option value="lose">Payment Sent</option>
							<option value="pending_received">Pending Payment (Received)</option>
							<option value="pending_sent">Pending Payment (Sent)</option>
						</select>
					</div>
					<div class="col-sm-2">
						<button class="btn btn-success" id="search">Search</button>
						<button class="btn btn-warning hiddenButton" id="cancelSearch">Cancel</button>
					</div>
				</div>
			</div>
			<div id="searchSection" class="hidden">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="d-flex flex-row">
								<div class="col-3 align-self-center">
									<div class="round">
										<i class="fa fa-exchange mediumIcon"></i>
									</div>
								</div>
								<div class="col-9 align-self-center text-right">
									<div class="m-l-10">
										<h5 id="SearchTN_MAD" class="mt-0">0</h5>
										<p class="mb-0 text-muted">Transactions<span class="bg-soft-success"></span></p>
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
										<h5 id="SearchTA_MAD" class="mt-0">0</h5>
										<p class="mb-0 text-muted">Amount<span class="bg-soft-success"></span></p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="d-flex flex-row">
								<div class="col-3 align-self-center">
									<div class="round">
										<i class="fa fa-exchange mediumIcon"></i>
									</div>
								</div>
								<div class="col-9 align-self-center text-right">
									<div class="m-l-10">
										<h5 id="SearchTN_USD" class="mt-0">0</h5>
										<p class="mb-0 text-muted">Transactions<span class="bg-soft-success"></span></p>
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
										<h5 id="SearchTA_USD" class="mt-0">0</h5>
										<p class="mb-0 text-muted">Amount<span class="bg-soft-success"></span></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<hr>
<!-- ************************************************************************************ TOTAL **********************************************-->
<h6 class="label-cards-group">Total Transactions</h6>
<!-- Gain insight -->
<div class="row" style="width:100%;">
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Total Bank Transactions (Received)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-exchange mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="BTTR" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Number <span class="bg-soft-success"></span></p>
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
                                <h5 id="BTTRA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Total Virtual Transactions (Received)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-exchange mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="VTTR" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Number <span class="bg-soft-success"></span></p>
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
                                <h5 id="VTTRA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Total Pending Transactions (Received)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-exchange mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="PTTR" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Number <span class="bg-soft-success"></span></p>
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
                                <h5 id="PTTRA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>	
			</div>
		</div>
	</div>
</div>
<!-- Sent Insight -->
<div class="row" style="width:100%;">
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Total Bank Transactions (Sent)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-exchange mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="BTTS" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Number <span class="bg-soft-success"></span></p>
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
                                <h5 id="BTTSA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Total Virtual Transactions (Sent)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-exchange mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="VTTS" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Number <span class="bg-soft-success"></span></p>
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
                                <h5 id="VTTSA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Total Pending Transactions (Sent)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-exchange mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="PTTS" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Number <span class="bg-soft-success"></span></p>
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
                                <h5 id="PTTSA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>	
			</div>
		</div>
	</div>
</div>
<!-- Profit Insight -->
<div class="row" style="width:100%;">
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Total Bank Transactions (Profit)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-money mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="BTTGA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Total Virtual Transactions (Profit)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-money mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="VTTGA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Total Pending Transactions (Profit)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-money mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="PTTGA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>	
			</div>
		</div>
	</div>
</div>
<hr>
<!-- ************************************************************************************ GUARANTEED **********************************************-->
<h6 class="label-cards-group">Guaranteed Transactions</h6>
<!-- Gain insight -->
<div class="row" style="width:100%;">
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Guaranteed Bank Transactions (Received)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-exchange mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="BTGR" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Number <span class="bg-soft-success"></span></p>
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
                                <h5 id="BTGRA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Guaranteed Virtual Transactions (Received)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-exchange mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="VTGR" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Number <span class="bg-soft-success"></span></p>
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
                                <h5 id="VTGRA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Guaranteed Pending Transactions (Received)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-exchange mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="PTGR" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Number <span class="bg-soft-success"></span></p>
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
                                <h5 id="PTGRA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>	
			</div>
		</div>
	</div>
</div>
<!-- Sent Insight -->
<div class="row" style="width:100%;">
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Guaranteed Bank Transactions (Sent)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-exchange mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="BTGS" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Number <span class="bg-soft-success"></span></p>
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
                                <h5 id="BTGSA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Guaranteed Virtual Transactions (Sent)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-exchange mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="VTGS" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Number <span class="bg-soft-success"></span></p>
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
                                <h5 id="VTGSA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Guaranteed Pending Transactions (Sent)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-exchange mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="PTGS" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Number <span class="bg-soft-success"></span></p>
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
                                <h5 id="PTGSA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>	
			</div>
		</div>
	</div>
</div>
<!-- Profit Insight -->
<div class="row" style="width:100%;">
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Guaranteed Bank Transactions (Profit)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-money mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="BTGGA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Guaranteed Virtual Transactions (Profit)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-money mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="VTGGA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Guaranteed Pending Transactions (Profit)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-money mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="PTGGA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>	
			</div>
		</div>
	</div>
</div>
<hr>
<!-- ************************************************************************************ Unguaranteed **********************************************-->
<h6 class="label-cards-group">Unguaranteed Transactions</h6>
<!-- Gain insight -->
<div class="row" style="width:100%;">
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Unsecured Bank Transactions (Received)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-exchange mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="BTUR" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Number <span class="bg-soft-success"></span></p>
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
                                <h5 id="BTURA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Unsecured Virtual Transactions (Received)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-exchange mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="VTUR" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Number <span class="bg-soft-success"></span></p>
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
                                <h5 id="VTURA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Unsecured Pending Transactions (Received)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-exchange mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="PTUR" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Number <span class="bg-soft-success"></span></p>
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
                                <h5 id="PTURA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>	
			</div>
		</div>
	</div>
</div>
<!-- Sent Insight -->
<div class="row" style="width:100%;">
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Unsecured Bank Transactions (Sent)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-exchange mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="BTUS" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Number <span class="bg-soft-success"></span></p>
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
                                <h5 id="BTUSA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Unsecured Virtual Transactions (Sent)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-exchange mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="VTUS" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Number <span class="bg-soft-success"></span></p>
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
                                <h5 id="VTUSA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Unsecured Pending Transactions (Sent)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-exchange mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="PTUS" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Number <span class="bg-soft-success"></span></p>
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
                                <h5 id="PTUSA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Transactions' Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>	
			</div>
		</div>
	</div>
</div>
<!-- Profit Insight -->
<div class="row" style="width:100%;">
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Unsecured Bank Transactions (Profit)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-money mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="BTUGA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Unsecured Virtual Transactions (Profit)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-money mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="VTUGA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card marginside1">
			<div class="card-body">
				<div class="card-title"><h6>Unsecured Pending Transactions (Profit)<h6></div>
				<div class="card-text">
					<div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="fa fa-money mediumIcon"></i>
                            </div>
                        </div>
                        <div class="col-9 align-self-center text-right">
                            <div class="m-l-10">
                                <h5 id="PTUGA" class="mt-0"></h5>
                                <p class="mb-0 text-muted">Amount <span class="bg-soft-success"></span></p>
                            </div>
                        </div>
                    </div>
				</div>	
			</div>
		</div>
	</div>
</div>
<hr>
<!-- ************************************************************************************ GRAPHS **********************************************-->
<h6 class="label-cards-group">Graphs</h6>
<!-- 7 days -->
<div class="row" style="width:100%;">
	<div class="col-lg-6">
		<div class="card marginside1">
			<div class="card-title"><h6>Last 7 days payments in MAD</h6></div>
			<div class="card-body">
				<canvas id="7DaysMAD" width="200" height="200" style="background-color:white;"></canvas>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card marginside1">
			<div class="card-title"><h6>Last 7 days payments in USD</h6></div>
			<div class="card-body">
				<canvas id="7DaysUSD" width="200" height="200" style="background-color:white;"></canvas>
			</div>
		</div>
	</div>
</div>
<div class="row" style="width:100%;">
	<div class="col-lg-6">
		<div class="card marginside1">
			<div class="card-title"><h6>Last 7 days profit in MAD</h6></div>
			<div class="card-body">
				<canvas id="7DaysProfitMAD" width="200" height="200" style="background-color:white;"></canvas>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card marginside1">
			<div class="card-title"><h6>Last 7 days profit in USD</h6></div>
			<div class="card-body">
				<canvas id="7DaysProfitUSD" width="200" height="200" style="background-color:white;"></canvas>
			</div>
		</div>
	</div>
</div>
<script src="js/insight.js?r=<?php echo rand(0,1100000000000); ?>"></script>
<?php include_once "template/footer.php"; ?>