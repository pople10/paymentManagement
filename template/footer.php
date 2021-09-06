<div class="modal" id="alertmodal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Alerts</h5>
        <button type="button" class="close closeused" data-dismiss=".modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="bodyalert" class="modal-body">
        
      </div>
	  <div id="bodyalert2" class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closeused" data-dismiss=".modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal" id="targetmodal" tabindex="-1">
  <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Target</h5>
        <button type="button" class="close closeused1" data-dismiss=".modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<div class="row justify-content-md-center" id="targetMessage">
			</div>
			<div class="row">
				<div class="col-sm-6">
					<label for="target1">Target</label>
				</div>
				<div class="col-sm-6">
					<div class="input-group mb-3">
					  <input type="text" class="form-control" id="target1" aria-describedby="MAD">
					  <div class="input-group-append">
						<span class="input-group-text" id="MAD">MAD</span>
					  </div>
					</div> 
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<center><button class="btn btn-success" id="submitTarget">Update</button></center>
				</div>
			</div>
      </div>
    </div>
  </div>
</div>
<!-- Large Modal for the profit today -->
<div id="TodayInsight" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Today Report</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-sm-6">
                    Gain :
                </div>
                <div class="col-sm-6">
                    <span id="modalGainMAD"></span> | <span id="modalGainUSD"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    Lose : 
                </div>
                <div class="col-sm-6">
                    <span id="modalLoseMAD"></span> | <span id="modalLoseUSD"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    Profit : 
                </div>
                <div class="col-sm-6">
                    <span id="modalProfitMAD"></span> | <span id="modalProfitUSD"></span>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>
	function targetMessage()
	{
						$.ajax({
							url:"controller/balanceController.php",
							type:"POST",
							data:{op:"toTarget",currency:"MAD"},
							async:false,
									success:function(dato)
									{	
										var diff = parseFloat(dato.data);
										if(diff>0)
                                            {
                                                $(".goal").css("color","red");
								                $("#targetMessage").html("<h6 style='color:#fb2828;'>You should get "+diff.toFixed(2)+" to your bank.</h6>");
                                            }
										else
                                            {
                                                $(".goal").css("color","green");
								                $("#targetMessage").html("<h6 style='color:#0abc17;'>Congratulation, you hit the target.</h6>");
                                            }
											
									},
									error: function(xhr, status, error) {
										alertify.error("Connection is off");
										console.log(xhr + " - " + status + " - " + error);
									}
							});
	}
	function alerting()
	{
		var previous_nbr = parseInt($(".badge").html());
		var nbr = 0;
		$.ajax({
			url:"controller/pendingController.php",
			type:"POST",
			data:{op:"late"},
			async:false,
					success:function(data)
					{	
						if(parseInt(data.data.nbr)>0)
						{
							$("#bodyalert").show();
							nbr += parseInt(data.data.nbr);
							$("#bodyalert").html("<a href='pending'><p>You have "+data.data.nbr+" late pending payment<span id='nbr1'></span>.</p></a>");
							if(parseInt(data.data.nbr)>1)
								$("#nbr1").text("s");
						}
						else if(parseInt(data.data.nbr)==0)
							$("#bodyalert").hide();
					},
					error: function(xhr, status, error) {
						alertify.error("Connection is off");
						console.log(xhr + " - " + status + " - " + error);
					}
		});
		$.ajax({
			url:"controller/actionController.php",
			type:"POST",
			data:{op:"late"},
			async:false,
					success:function(data)
					{	
						if(parseInt(data.data.nbr)>0)
						{	$("#bodyalert2").show();
							nbr += parseInt(data.data.nbr);
							$("#bodyalert2").html("<a href='action'><p>You have "+data.data.nbr+" task<span id='nbr2'></span> to do.</p></a>");
							if(parseInt(data.data.nbr)>1)
								$("#nbr2").text("s");
						}
						else if(parseInt(data.data.nbr)==0)
							$("#bodyalert2").hide();
					},
					error: function(xhr, status, error) {
						alertify.error("Connection is off");
						console.log(xhr + " - " + status + " - " + error);
					}
		});
		$(".fa.fa-bell").click(function(){
			$("#alertmodal").fadeIn(200);
		});
		$(".closeused").click(function(){
			$("#alertmodal").hide();
		});
		$(".closeused1").click(function(){
			$("#targetmodal").hide();
		});
		$(".badge").show();
		$(".badge").text(nbr);
		if(nbr==0)
			{$("#bodyalert").show().html("<p>You have no alerts for this time.</p>");$("#bodyalert2").html("");$("#bodyalert2").hide();$(".badge").hide();}
		return nbr-previous_nbr;
	}
	alerting();
    targetMessage();
	setInterval(function(){
		var diff = alerting();
		if(diff>0)
		{var audio = new Audio('./assets/notification.mp3');
		audio.play();}
	},3000);
	function loading(){
	$(".loading").fadeOut(1000);
	}
	$("#MAD").css("height",$("#target1").css("height"));
	$(".goal").click(function(){
		var flag="Update";
		targetMessage();		
		$.ajax({
			url:"controller/balanceController.php",
			type:"POST",
			data:{op:"getTarget",currency:"MAD"},
			async:false,
					success:function(dato)
					{	
						var data = dato.data;
						if((data=="false"||data==false||data==""||data==null))
						{
							flag="Add";
							$("#targetMessage").html("");
						}
						else
						 {
							$("#target1").val(data.amount);
						 }
							
					},
					error: function(xhr, status, error) {
						alertify.error("Connection is off");
						console.log(xhr + " - " + status + " - " + error);
					}
		});
		if(flag=="Add")
		{
			$("#submitTarget").text("Add");
		}
		else
		{
			$("#submitTarget").text("Update");
		}
		$("#targetmodal").fadeIn(200);
	});
	$("#submitTarget").click(function(){
		var target = $("#target1").val();
		let err=null;
		if(!isNumeric(target)||!isPositiveFloat(target))
			{err=-1;alertify.error("Enter a valid target");}
		if(err==null)
		if($(this).text()=="Add")
		{
			$.ajax({
			url:"controller/balanceController.php",
			type:"POST",
			data:{op:"addTarget",currency:"MAD",amount:target},
			async:false,
					success:function(dato)
					{	
						alertify.success("New Target is set! Be strong and patient");
						$("#submitTarget").text("Update");
							
					},
					error: function(xhr, status, error) {
						alertify.error("Connection is off");
						console.log(xhr + " - " + status + " - " + error);
					}
			});
		}
		else
		{
			$.ajax({
			url:"controller/balanceController.php",
			type:"POST",
			data:{op:"updateTarget",currency:"MAD",amount:target},
			async:false,
					success:function(dato)
					{	
						alertify.success("New Target is updated! Be strong and patient");
							
					},
					error: function(xhr, status, error) {
						alertify.error("Connection is off");
						console.log(xhr + " - " + status + " - " + error);
					}
			});
		}
		targetMessage();
	});
    $(".todayReportIcon").click(function(){
        $("#TodayInsight").modal("show");
		$.ajax({
			url:"controller/balanceController.php",
			type:"POST",
			data:{op:"getTodayInsight"},
			async:false,
					success:function(dato)
					{	
						var data = dato.data;
						if(typeof dato == "object")
                            {
                                $("#modalGainMAD").text(formatMoney(data.gain_MAD)+" MAD").css("color","#09cc33");
                                $("#modalGainUSD").text(formatMoney(data.gain_USD)+" USD").css("color","#09cc33");
                                $("#modalLoseMAD").text(formatMoney(data.lose_MAD)+" MAD").css("color","#ff3030");
                                $("#modalLoseUSD").text(formatMoney(data.lose_USD)+" USD").css("color","#ff3030");
                                $("#modalProfitMAD").text(formatMoney(data.profit_MAD)+" MAD").css("color","#0400ed");
                                $("#modalProfitUSD").text(formatMoney(data.profit_USD)+" USD").css("color","#0400ed");
                            }
							
					},
					error: function(xhr, status, error) {
						alertify.error("Connection is off");
						console.log(xhr + " - " + status + " - " + error);
					}
		});
    });
    $.ajax({
        url:"controller/globalController.php",
		type:"POST",
		data:{op:"securePayments"},
		async:false,
		success:function(dato)
			{	
							
			},
		error: function(xhr, status, error) {
			     alertify.error("Connection is off");
			     console.log(xhr + " - " + status + " - " + error);
			}
    });
	/* Prevent Inspect Element */
	document.addEventListener('contextmenu', function(e) {
	  e.preventDefault();
	});
	document.onkeydown = function(e) {
	  if(event.keyCode == 123) {
		 return false;
	  }
	  if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
		 return false;
	  }
	  if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
		 return false;
	  }
	  if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
		 return false;
	  }
	  if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
		 return false;
	  }
	}
	/* End Prevent Inspect Element */
	/* Prevent Copy */
	/*document.onkeydown = function(e) {
	  if(event.keyCode == 123) {
		 return false;
	  }
	  if(e.ctrlKey && e.keyCode == 'C'.charCodeAt(0)) {
		 return false;
	  }
	}*/
	/* End Prevent Copy */
</script>
<div class="footerspace"></div>
<nav class="bg-primary footer">
  <center><div class="copyright">Developed by Mohammed Amine AYACHE ©</div></center>
</nav>
</body>
</html>