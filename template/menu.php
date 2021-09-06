<div class="nav-custom">
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	  <a class="navbar-brand" href="dashboard">
		<img src="./img/logo.png" alt="AYACHE MANAGEMENT">
		<!--<h2 style="display:inline-block">AYACHE</h1>
		<h3 style="display:inline">MANAGEMENT</h2>-->
	  </a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
			  <li class="nav-item active">
				<a class="nav-link" href="dashboard">Dashboard <span class="sr-only">(current)</span></a>
			  </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Payments
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="gain">Payment Received</a>
                    <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="lose">Payment Sent</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="pending">Pending Payment</a>
                </div>
              </li>
			  <li class="nav-item">
				<a class="nav-link" href="insight">Insight</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="action">To Do List</a>
			  </li>
                <li class="nav-item">
				<a class="nav-link" href="contact">Contacts</a>
			  </li>
			</ul>
	    </div>
		<div class="alert">
                <i class="fa fa-calendar todayReportIcon notification"></i>
				<i class="fa fa-bullseye goal notification"></i>
				<i class="fa fa-bell notification">
				    <span class="badge"></span>
				</i>
				<a href="controller/logoutController.php"><i class="fa fa-sign-out notification"></i></a>
		</div>
		<div class="clear"></div>
	</nav>
</div>