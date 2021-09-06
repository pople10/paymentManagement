<?php include_once "template/header.php"; ?>
<style>
body{background-color:white!important;}
</style>
<div class="row" style="postion:relative;height:100%;">
<div class="loginSection">
	<div class="row mx-auto" style="margin-bottom:20px;padding-left:34px;width:100%">
	 <img alt="Logo" src="./img/logoBlack.png">
	</div>
	<div class="row" style="margin-bottom:20px;padding:20px;">
		<div class="col-xl-12">
			<label for="user" style="margin-right:20px;"><h6>Username</h6></label>
			<input type="text" id="user"/>
		</div>
	</div>
	<div class="row" style="margin-bottom:5px;padding:20px;">
		<div class="col-xl-12">
			<label for="password" style="margin-right:20px;"><h6>Password</h6></label>
			<input type="password" id="password"/>
		</div>
	</div>
	<div class="row mx-auto" style="margin-bottom:20px;padding:5px;width:100px;">
		<div class="col-xl-12">
			<button class="btn btn-success" id="submitLogin">Login</button>
		</div>
	</div>
</div>
</div>
<script src="js/login.js?r=<?php echo rand(0,1100000000000); ?>"></script>
</body>
</html>