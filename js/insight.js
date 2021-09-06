$(".nav-item").removeClass("active");
$("a[href='insight']").addClass("active");
const _MS_PER_DAY = 1000 * 60 * 60 * 24;
function getDays(day)
{
day-=1;
var today = new Date();
var days=[];
for(var i=day;i>=0;i--)
	{
		let temp_date = new Date();
		temp_date.setDate(today.getDate() - i);
		days.push(temp_date.getFullYear()+'-'+(temp_date.getMonth()+1)+'-'+(temp_date.getDate()));
	}
 return days;
}
function dateDiffInDays(a, b) {
  const utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
  const utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());
  return Math.floor((utc2 - utc1) / _MS_PER_DAY);
}
function getZeros_array(nbr)
{
	var array=[];
	for(var i=0;i<nbr;i++)
		array.push(0);
	return array;
}
function pushDaysNumber(nbr)
{
	var array=[];
	for(var i=0;i<nbr;i++)
		array.push(i+1);
	return array;
}
$(document).ready(function(){
	/*************************************************************** 7 Days ***********************************************************/
	var sevendays=getDays(7);
	var sevenGainMAD_amount=[0,0,0,0,0,0,0];
	var sevenGainUSD_amount=[0,0,0,0,0,0,0];
	var sevenLoseMAD_amount=[0,0,0,0,0,0,0];
	var sevenLoseUSD_amount=[0,0,0,0,0,0,0];
	var sevenProfitMAD_amount=[0,0,0,0,0,0,0];
	var sevenProfitUSD_amount=[0,0,0,0,0,0,0];
	/* Gain */
	$.ajax({
		url:"controller/insightController.php",
		type:"POST",
		data:{op:"lastSevenDaysGain",currency:"MAD"},
		async:false,
		success:function(data)
		{	
			data.data.forEach(function(d){
				sevenGainMAD_amount[dateDiffInDays(new Date (sevendays[0]),new Date (d.date))]=d.amount;
			});
		},
		error: function(xhr, status, error) {
			alert(xhr.responseText);
			alertify.error("Something wrong try again");
			console.log(xhr + " - " + status + " - " + error);

		}
	});
	$.ajax({
		url:"controller/insightController.php",
		type:"POST",
		data:{op:"lastSevenDaysGain",currency:"USD"},
		async:false,
		success:function(data)
		{	
			data.data.forEach(function(d){
				sevenGainUSD_amount[dateDiffInDays(new Date (sevendays[0]),new Date (d.date))]=d.amount;
			});
		},
		error: function(xhr, status, error) {
			alert(xhr.responseText);
			alertify.error("Something wrong try again");
			console.log(xhr + " - " + status + " - " + error);

		}
	});
	/* Lose */
	$.ajax({
		url:"controller/insightController.php",
		type:"POST",
		data:{op:"lastSevenDaysLose",currency:"MAD"},
		async:false,
		success:function(data)
		{	
			data.data.forEach(function(d){
				sevenLoseMAD_amount[dateDiffInDays(new Date (sevendays[0]),new Date (d.date))]=d.amount;
			});
		},
		error: function(xhr, status, error) {
			alert(xhr.responseText);
			alertify.error("Something wrong try again");
			console.log(xhr + " - " + status + " - " + error);

		}
	});
	$.ajax({
		url:"controller/insightController.php",
		type:"POST",
		data:{op:"lastSevenDaysLose",currency:"USD"},
		async:false,
		success:function(data)
		{	
			data.data.forEach(function(d){
				sevenLoseUSD_amount[dateDiffInDays(new Date (sevendays[0]),new Date (d.date))]=d.amount;
			});
		},
		error: function(xhr, status, error) {
			alert(xhr.responseText);
			alertify.error("Something wrong try again");
			console.log(xhr + " - " + status + " - " + error);

		}
	});
	for(var i=0;i<7;i++)
	{
		sevenProfitMAD_amount[i]=parseInt(sevenGainMAD_amount[i])-parseInt(sevenLoseMAD_amount[i]);
		sevenProfitUSD_amount[i]=parseInt(sevenGainUSD_amount[i])-parseInt(sevenLoseUSD_amount[i]);
	}
	graph2(sevendays,sevenGainUSD_amount,sevenLoseUSD_amount,"7DaysUSD","USD");
	graph2(sevendays,sevenGainMAD_amount,sevenLoseMAD_amount,"7DaysMAD","MAD");
	graph(sevendays,sevenProfitUSD_amount,"7DaysProfitUSD","USD");
	graph(sevendays,sevenProfitMAD_amount,"7DaysProfitMAD","MAD");
	/*************************************************************** Custom ***********************************************************/
	var profit_mad=0;
	var profit_usd=0;
	var profit_mad_pending=0;
	var profit_usd_pending=0;
	$.ajax({
		url:"controller/insightController.php",
		type:"POST",
		data:{op:"TotalReceived"},
		async:false,
		success:function(data)
		{	
			let d=data.data;
			if(d.length<2);
			{
				profit_mad_g-=0;
				$("#BTTR").text(0);
				$("#BTTRA").text(formatMoney(0)+" MAD").css("color","red");
				profit_usd_g-=0;
				$("#VTTR").text(0);
				$("#VTTRA").text("$"+formatMoney(0)).css("color","red");
			}
			d.forEach(function(d){
				if(d.currency=="MAD")
				{
					$("#BTTR").text(d.nbr);
					$("#BTTRA").text(formatMoney(d.total)+" MAD").css("color","green");
					profit_mad+=parseFloat(d.total);
				}
				else
				{
					profit_usd+=parseFloat(d.total);
					$("#VTTR").text(d.nbr);
					$("#VTTRA").text("$"+formatMoney(d.total)).css("color","green");
				}
			});
		},
		error: function(xhr, status, error) {
			alert(xhr.responseText);
			alertify.error("Something wrong try again");
			console.log(xhr + " - " + status + " - " + error);

		}
	});
	$.ajax({
		url:"controller/insightController.php",
		type:"POST",
		data:{op:"TotalSent"},
		async:false,
		success:function(data)
		{	
			let d=data.data;
			if(d.length<2);
			{
				profit_mad_g-=0;
				$("#BTTS").text(0);
				$("#BTTSA").text(formatMoney(0)+" MAD").css("color","red");
				profit_usd_g-=0;
				$("#VTTS").text(0);
				$("#VTTSA").text("$"+formatMoney(0)).css("color","red");
			}
			d.forEach(function(d){
				if(d.currency=="MAD")
				{
					profit_mad-=parseFloat(d.total);
					$("#BTTS").text(d.nbr);
					$("#BTTSA").text(formatMoney(d.total)+" MAD").css("color","red");
				}
				else
				{
					profit_usd-=parseFloat(d.total);
					$("#VTTS").text(d.nbr);
					$("#VTTSA").text("$"+formatMoney(d.total)).css("color","red");
				}
			});
		},
		error: function(xhr, status, error) {
			alert(xhr.responseText);
			alertify.error("Something wrong try again");
			console.log(xhr + " - " + status + " - " + error);

		}
	});
	var test = ["USD_received","MAD_received","USD_sent","MAD_sent"];
	var including = [];
	var total_nbr_r=0;
	var total_nbr_s=0;
	$.ajax({
		url:"controller/insightController.php",
		type:"POST",
		data:{op:"TotalPending"},
		async:false,
		success:function(data)
		{	
			let d=data.data;
			d.forEach(function(d){
				including.push(d.currency+"_"+d.flow);
				if(d.flow=="sent")
				{
					total_nbr_s+=parseInt(d.nbr);
					if(d.currency=="MAD")
					{
						profit_mad_pending-=parseFloat(d.total);
						$("#PTTS").html(parseInt(d.nbr));
						$("#PTTSA").html(formatMoney(d.total)+" MAD").css("color","red");
					}
					else
					{
						profit_usd_pending-=parseFloat(d.total);
						$("#PTTS").append(" + "+parseInt(d.nbr)+" = ");
						$("#PTTSA").append(" + "+"$"+formatMoney(d.total)).css("color","red");
					}
				}
				else
				{
					total_nbr_r+=parseInt(d.nbr);
					if(d.currency=="MAD")
					{
						profit_mad_pending+=parseFloat(d.total);
						$("#PTTR").html(parseInt(d.nbr));
						$("#PTTRA").html(formatMoney(d.total)+" MAD").css("color","green");
					}
					else
					{
						profit_usd_pending+=parseFloat(d.total);
						$("#PTTR").append(" + "+parseInt(d.nbr)+" = ");
						$("#PTTRA").append(" + "+"$"+formatMoney(d.total)).css("color","green");
					}
				}
			});
		},
		error: function(xhr, status, error) {
			alert(xhr.responseText);
			alertify.error("Something wrong try again");
			console.log(xhr + " - " + status + " - " + error);

		}
	});
	test.forEach(function(d){
		var currency=d.split("_")[0];
		var flow=d.split("_")[1];
		if(!including.includes(d)) 
		{
				if(flow=="sent")
				{
					total_nbr_s+=parseInt(0);
					if(currency=="MAD")
					{
						profit_mad_pending-=parseFloat(0);
						$("#PTTS").html(parseInt(0)+$("#PTTS").html());
						$("#PTTSA").html(formatMoney(0)+" MAD"+$("#PTTSA").html()).css("color","red");
					}
					else
					{
						profit_usd_pending-=parseFloat(0);
						$("#PTTS").append(" + "+parseInt(0)+" = ");
						$("#PTTSA").append(" + "+"$"+formatMoney(0)).css("color","red");
					}
				}
				else
				{
					total_nbr_r+=parseInt(0);
					if(currency=="MAD")
					{
						profit_mad_pending+=parseFloat(0);
						$("#PTTR").html(parseInt(0)+$("#PTTR").html());
						$("#PTTRA").html(formatMoney(0)+" MAD"+$("#PTTRA").html()).css("color","green");
					}
					else
					{
						profit_usd_pending+=parseFloat(0);
						$("#PTTR").append(" + "+parseInt(0)+" = ");
						$("#PTTRA").append(" + "+"$"+formatMoney(0)).css("color","green");
					}
				}
		}
	});
	$("#PTTR").append(total_nbr_r);
	$("#PTTS").append(total_nbr_s);
	$("#PTTRA").css("font-size","1.3vw");
	$("#PTTSA").css("font-size","1.3vw");
	$("#BTTGA").text(formatMoney(profit_mad)+" MAD").css("color","blue");
	$("#VTTGA").text("$"+formatMoney(profit_usd)).css("color","blue");
	$("#PTTGA").text(formatMoney(profit_mad_pending)+" MAD + "+"$"+formatMoney(profit_usd_pending)).css("color","blue").css("font-size","1.3vw");
	/************************************************************************** Guaranteed *******************************************/
	var profit_mad_g=0;
	var profit_usd_g=0;
	var profit_mad_pending_g=0;
	var profit_usd_pending_g=0;
	$.ajax({
		url:"controller/insightController.php",
		type:"POST",
		data:{op:"TotalReceivedG"},
		async:false,
		success:function(data)
		{	
			let d=data.data;
			if(d.length<2);
			{
				profit_mad_g-=0;
				$("#BTGR").text(0);
				$("#BTGRA").text(formatMoney(0)+" MAD").css("color","green");
				profit_usd_g-=0;
				$("#VTGR").text(0);
				$("#VTGRA").text("$"+formatMoney(0)).css("color","green");
			}
			d.forEach(function(d){
				if(d.currency=="MAD")
				{
					$("#BTGR").text(d.nbr);
					$("#BTGRA").text(formatMoney(d.total)+" MAD").css("color","green");
					profit_mad_g+=parseFloat(d.total);
				}
				else
				{
					profit_usd_g+=parseFloat(d.total);
					$("#VTGR").text(d.nbr);
					$("#VTGRA").text("$"+formatMoney(d.total)).css("color","green");
				}
			});
		},
		error: function(xhr, status, error) {
			alert(xhr.responseText);
			alertify.error("Something wrong try again");
			console.log(xhr + " - " + status + " - " + error);

		}
	});
	$.ajax({
		url:"controller/insightController.php",
		type:"POST",
		data:{op:"TotalSentG"},
		async:false,
		success:function(data)
		{	
			let d=data.data;
			if(d.length<2);
			{
				profit_mad_g-=0;
				$("#BTGS").text(0);
				$("#BTGSA").text(formatMoney(0)+" MAD").css("color","red");
				profit_usd_g-=0;
				$("#VTGS").text(0);
				$("#VTGSA").text("$"+formatMoney(0)).css("color","red");
			}
			d.forEach(function(d){
				if(d.currency=="MAD")
				{
					profit_mad_g-=parseFloat(d.total);
					$("#BTGS").text(d.nbr);
					$("#BTGSA").text(formatMoney(d.total)+" MAD").css("color","red");
				}
				else
				{
					profit_usd_g-=parseFloat(d.total);
					$("#VTGS").text(d.nbr);
					$("#VTGSA").text("$"+formatMoney(d.total)).css("color","red");
				}
			});
		},
		error: function(xhr, status, error) {
			alert(xhr.responseText);
			alertify.error("Something wrong try again");
			console.log(xhr + " - " + status + " - " + error);

		}
	});
	var test = ["USD_received","MAD_received","USD_sent","MAD_sent"]
	var including = [];
	var total_nbr_r=0;
	var total_nbr_s=0;
	$.ajax({
		url:"controller/insightController.php",
		type:"POST",
		data:{op:"TotalPendingG"},
		async:false,
		success:function(data)
		{	
			let d=data.data;
			d.forEach(function(d){
				including.push(d.currency+"_"+d.flow);
				if(d.flow=="sent")
				{
					total_nbr_s+=parseInt(d.nbr);
					if(d.currency=="MAD")
					{
						profit_mad_pending_g-=parseFloat(d.total);
						$("#PTGS").html(parseInt(d.nbr));
						$("#PTGSA").html(formatMoney(d.total)+" MAD").css("color","red");
					}
					else
					{
						profit_usd_pending_g-=parseFloat(d.total);
						$("#PTGS").append(" + "+parseInt(d.nbr)+" = ");
						$("#PTGSA").append(" + "+"$"+formatMoney(d.total)).css("color","red");
					}
				}
				else
				{
					total_nbr_r+=parseInt(d.nbr);
					if(d.currency=="MAD")
					{
						profit_mad_pending_g+=parseFloat(d.total);
						$("#PTGR").html(parseInt(d.nbr));
						$("#PTGRA").html(formatMoney(d.total)+" MAD").css("color","green");
					}
					else
					{
						profit_usd_pending_g+=parseFloat(d.total);
						$("#PTGR").append(" + "+parseInt(d.nbr)+" = ");
						$("#PTGRA").append(" + "+"$"+formatMoney(d.total)).css("color","green");
					}
				}
			});
		},
		error: function(xhr, status, error) {
			alert(xhr.responseText);
			alertify.error("Something wrong try again");
			console.log(xhr + " - " + status + " - " + error);

		}
	});
	test.forEach(function(d){
		var currency=d.split("_")[0];
		var flow=d.split("_")[1];
		if(!including.includes(d)) 
		{
				if(flow=="sent")
				{
					total_nbr_s+=parseInt(0);
					if(currency=="MAD")
					{
						profit_mad_pending_g-=parseFloat(0);
						$("#PTGS").html(parseInt(0)+$("#PTGS").html());
						$("#PTGSA").html(formatMoney(0)+" MAD"+$("#PTGSA").html()).css("color","red");
					}
					else
					{
						profit_usd_pending_g-=parseFloat(0);
						$("#PTGS").append(" + "+parseInt(0)+" = ");
						$("#PTGSA").append(" + "+"$"+formatMoney(0)).css("color","red");
					}
				}
				else
				{
					total_nbr_r+=parseInt(0);
					if(currency=="MAD")
					{
						profit_mad_pending_g+=parseFloat(0);
						$("#PTGR").html(parseInt(0)+$("#PTGR").html());
						$("#PTGRA").html(formatMoney(0)+" MAD"+$("#PTGRA").html()).css("color","green");
					}
					else
					{
						profit_usd_pending_g+=parseFloat(0);
						$("#PTGR").append(" + "+parseInt(0)+" = ");
						$("#PTGRA").append(" + "+"$"+formatMoney(0)).css("color","green");
					}
				}
		}
	});
	$("#PTGR").append(total_nbr_r);
	$("#PTGS").append(total_nbr_s);
	$("#PTGRA").css("font-size","1.3vw");
	$("#PTGSA").css("font-size","1.3vw");
	$("#BTGGA").text(formatMoney(profit_mad_g)+" MAD").css("color","blue");
	$("#VTGGA").text("$"+formatMoney(profit_usd_g)).css("color","blue");
	$("#PTGGA").text(formatMoney(profit_mad_pending_g)+" MAD + "+"$"+formatMoney(profit_usd_pending_g)).css("color","blue").css("font-size","1.3vw");
	/************************************************************************** Unguaranteed *******************************************/
	var profit_mad_u=0;
	var profit_usd_u=0;
	var profit_mad_pending_u=0;
	var profit_usd_pending_u=0;
	$.ajax({
		url:"controller/insightController.php",
		type:"POST",
		data:{op:"TotalReceivedU"},
		async:false,
		success:function(data)
		{	
			let d=data.data;
			if(d.length<2);
			{
				profit_mad_u-=0;
				$("#BTUR").text(0);
				$("#BTURA").text(formatMoney(0)+" MAD").css("color","green");
				profit_usd_u-=0;
				$("#VTUR").text(0);
				$("#VTURA").text("$"+formatMoney(0)).css("color","green");
			}
			d.forEach(function(d){
				if(d.currency=="MAD")
				{
					$("#BTUR").text(d.nbr);
					$("#BTURA").text(formatMoney(d.total)+" MAD").css("color","green");
					profit_mad_u+=parseFloat(d.total);
				}
				else
				{
					profit_usd_u+=parseFloat(d.total);
					$("#VTUR").text(d.nbr);
					$("#VTURA").text("$"+formatMoney(d.total)).css("color","green");
				}
			});
		},
		error: function(xhr, status, error) {
			alert(xhr.responseText);
			alertify.error("Something wrong try again");
			console.log(xhr + " - " + status + " - " + error);

		}
	});
	$.ajax({
		url:"controller/insightController.php",
		type:"POST",
		data:{op:"TotalSentU"},
		async:false,
		success:function(data)
		{	
			let d=data.data;
			if(d.length<2);
			{
				profit_mad_u-=0;
				$("#BTUS").text(0);
				$("#BTUSA").text(formatMoney(0)+" MAD").css("color","red");
				profit_usd_u-=0;
				$("#VTUS").text(0);
				$("#VTUSA").text("$"+formatMoney(0)).css("color","red");
			}
			d.forEach(function(d){
				if(d.currency=="MAD")
				{
					profit_mad_u-=parseFloat(d.total);
					$("#BTUS").text(d.nbr);
					$("#BTUSA").text(formatMoney(d.total)+" MAD").css("color","red");
				}
				else
				{
					profit_usd_u-=parseFloat(d.total);
					$("#VTUS").text(d.nbr);
					$("#VTUSA").text("$"+formatMoney(d.total)).css("color","red");
				}
			});
		},
		error: function(xhr, status, error) {
			alert(xhr.responseText);
			alertify.error("Something wrong try again");
			console.log(xhr + " - " + status + " - " + error);

		}
	});
	var test = ["USD_received","MAD_received","USD_sent","MAD_sent"]
	var including = [];
	var total_nbr_r=0;
	var total_nbr_s=0;
	$.ajax({
		url:"controller/insightController.php",
		type:"POST",
		data:{op:"TotalPendingU"},
		async:false,
		success:function(data)
		{	
			let d=data.data;
			d.forEach(function(d){
				including.push(d.currency+"_"+d.flow);
				if(d.flow=="sent")
				{
					total_nbr_s+=parseInt(d.nbr);
					if(d.currency=="MAD")
					{
						profit_mad_pending_u-=parseFloat(d.total);
						$("#PTUS").html(parseInt(d.nbr));
						$("#PTUSA").html(formatMoney(d.total)+" MAD").css("color","red");
					}
					else
					{
						profit_usd_pending_u-=parseFloat(d.total);
						$("#PTUS").append(" + "+parseInt(d.nbr)+" = ");
						$("#PTUSA").append(" + "+"$"+formatMoney(d.total)).css("color","red");
					}
				}
				else
				{
					total_nbr_r+=parseInt(d.nbr);
					if(d.currency=="MAD")
					{
						profit_mad_pending_u+=parseFloat(d.total);
						$("#PTUR").html(parseInt(d.nbr));
						$("#PTURA").html(formatMoney(d.total)+" MAD").css("color","green");
					}
					else
					{
						profit_usd_pending_u+=parseFloat(d.total);
						$("#PTUR").append(" + "+parseInt(d.nbr)+" = ");
						$("#PTURA").append(" + "+"$"+formatMoney(d.total)).css("color","green");
					}
				}
			});
		},
		error: function(xhr, status, error) {
			alert(xhr.responseText);
			alertify.error("Something wrong try again");
			console.log(xhr + " - " + status + " - " + error);

		}
	});
	test.forEach(function(d){
		var currency=d.split("_")[0];
		var flow=d.split("_")[1];
		if(!including.includes(d)) 
		{
				if(flow=="sent")
				{
					total_nbr_s+=parseInt(0);
					if(currency=="MAD")
					{
						profit_mad_pending_u-=parseFloat(0);
						$("#PTUS").html(parseInt(0)+$("#PTUS").html());
						$("#PTUSA").html(formatMoney(0)+" MAD"+$("#PTUSA").html()).css("color","red");
					}
					else
					{
						profit_usd_pending_u-=parseFloat(0);
						$("#PTUS").append(" + "+parseInt(0)+" = ");
						$("#PTUSA").append(" + "+"$"+formatMoney(0)).css("color","red");
					}
				}
				else
				{
					total_nbr_r+=parseInt(0);
					if(currency=="MAD")
					{
						profit_mad_pending_u+=parseFloat(0);
						$("#PTUR").html(parseInt(0)+$("#PTUR").html());
						$("#PTURA").html(formatMoney(0)+" MAD"+$("#PTURA").html()).css("color","green");
					}
					else
					{
						profit_usd_pending_u+=parseFloat(0);
						$("#PTUR").append(" + "+parseInt(0)+" = ");
						$("#PTURA").append(" + "+"$"+formatMoney(0)).css("color","green");
					}
				}
		}
	});
	$("#PTUR").append(total_nbr_r);
	$("#PTUS").append(total_nbr_s);
	$("#PTURA").css("font-size","1.3vw");
	$("#PTUSA").css("font-size","1.3vw");
	$("#BTUGA").text(formatMoney(profit_mad_u)+" MAD").css("color","blue");
	$("#VTUGA").text("$"+formatMoney(profit_usd_u)).css("color","blue");
	$("#PTUGA").text(formatMoney(profit_mad_pending_u)+" MAD + "+"$"+formatMoney(profit_usd_pending_u)).css("color","blue").css("font-size","1.3vw");
	/************************************************************************** Search *******************************************/
	$("#search").click(function(){
		var type = $("#type").val();
		var table = $("#table").val().split("_")[0];
		var flow = ($("#table").val().split("_")[1]==undefined)?1:$("#table").val().split("_")[1];
		var colorSearchAmount=null;
		if(table=="gain")
			colorSearchAmount="green";
		else if(table=="lose")
			colorSearchAmount="red";
		else
		{
			if(flow=="received")
				colorSearchAmount="green";
			else 
				colorSearchAmount="red";
		}
		$.ajax({
			url:"controller/insightController.php",
			type:"POST",
			data:{op:"search",type:type,table:table,flow:flow},
			async:false,
			success:function(data)
			{	
				$("#cancelSearch").removeClass("hiddenButton");
				$("#SearchTN_MAD").text(0);
				$("#SearchTA_MAD").text(formatMoney(0)+" MAD").css("color","black");
				$("#SearchTN_USD").text(0);
				$("#SearchTA_USD").text("$"+formatMoney(0)).css("color","black");
				$("#searchSection").show();
				let d=data.data;
				d.forEach(function(d){
					if(d.currency=="MAD")
					{
						$("#SearchTN_MAD").text(d.nbr);
						$("#SearchTA_MAD").text(formatMoney(d.total)+" MAD").css("color",colorSearchAmount);
					}
					else
					{
						$("#SearchTN_USD").text(d.nbr);
						$("#SearchTA_USD").text("$"+formatMoney(d.total)).css("color",colorSearchAmount);
					}
				});
			},
			error: function(xhr, status, error) {
				alert(xhr.responseText);
				alertify.error("Something wrong try again");
				console.log(xhr + " - " + status + " - " + error);

			}
		});
	});
	$("#cancelSearch").click(function(){
		$("#type").val("");
		$("#table").val("gain");
		$("#cancelSearch").addClass("hiddenButton");
		$("#searchSection").hide();
	});
});
function graph(labels,dt,id,currency) {
		if(currency=="USD") var color="rgba(255, 99, 132, 0.4)";
		else var color="rgba(40, 49, 121, 0.4)";
        if(document.getElementById(id) == null)
            return null;
        var ctx = document.getElementById(id).getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: "Payment in "+currency,
                        fill: true,
                        lineTension: 0.5,
                        backgroundColor: color,
                        borderColor: (currency=="USD")?"rgba(255, 99, 132, 0.4)":"#283179",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: (currency=="USD")?"#283179":"#ebeff2",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: (currency=="USD")? "#ebeff2":"#283179",
                        pointHoverBorderColor: (currency=="USD")?"#eef0f2":"#3bc9f1",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: dt
                    }]
            },
			options: {
                scales: {
                    yAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Amount'
                            }
                        }],
                    xAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'Days'
                            }
                        }]
                }
            }
        });

}
function graph2(labels, dt, dvt,id,currency) {
        if(document.getElementById(id) == null)
            return null;
        var ctx = document.getElementById(id).getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels, //,
                datasets: [
                    {
                        label: "Payment Received in "+currency,
                        fill: true,
                        lineTension: 0.5,
                        backgroundColor: "rgba(40, 49, 121, 0.4)",
                        borderColor: "#283179",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: "#283179",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "#283179",
                        pointHoverBorderColor: "#3bc9f1",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: dt
                    },
                    {
                        label: "Payment Sent in "+currency,
                        fill: true,
                        lineTension: 0.5,
                        backgroundColor: "rgba(255, 99, 132, 0.4)",
                        borderColor: "rgba(255, 99, 132, 1)",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: "#ebeff2",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "#ebeff2",
                        pointHoverBorderColor: "#eef0f2",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: dvt
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Amount'
                            }
                        }],
                    xAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'Days'
                            }
                        }]
                }
            }
        });
}
function graph3(labels,dt,id,currency) {
		if(currency=="USD") var color="rgba(255, 99, 132, 0.4)";
		else var color="rgba(40, 49, 121, 0.4)";
        if(document.getElementById(id) == null)
			{alert(id);return null;}
        var ctx = document.getElementById(id).getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: "Payment in "+currency,
                        fill: true,
                        lineTension: 0.5,
                        backgroundColor: color,
                        borderColor: (currency=="USD")?"rgba(255, 99, 132, 0.4)":"#283179",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: (currency=="USD")?"#283179":"#ebeff2",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: (currency=="USD")? "#ebeff2":"#283179",
                        pointHoverBorderColor: (currency=="USD")?"#eef0f2":"#3bc9f1",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: dt
                    }]
            },
			options: {
                scales: {
                    yAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Amount'
                            }
                        }],
                    xAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'Days'
                            }
                        }]
                }
            }
        });

}