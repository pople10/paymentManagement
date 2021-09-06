$(document).ready(function(){
	$.ajax({
		url:"controller/balanceController.php",
		type:"POST",
		data:{op:"getBank"},async:false,
		success:function(data)
		{	var bank = parseFloat(data.data.amount);
			$("#bankmad").text(formatMoney(bank.toFixed(2))).css("color",amounting(bank));
			//$("#bankusd").text((bank*convert_MAD_to_USD.MAD_USD).toFixed(2)).css("color",amounting(bank));
		},
		error: function(xhr, status, error) {

				console.log(xhr + " - " + status + " - " + error);

		}
	});
	$.ajax({
		url:"controller/balanceController.php",
		type:"POST",
		data:{op:"getVirtual"},async:false,
		success:function(data)
		{	var virtual = parseFloat(data.data.amount);
			$("#virtualusd").text(formatMoney(virtual.toFixed(2))).css("color",amounting(virtual));
			//$("#virtualmad").text((virtual*convert_USD_to_MAD.USD_MAD).toFixed(2)).css("color",amounting(virtual));
		},
		error: function(xhr, status, error) {

				console.log(xhr + " - " + status + " - " + error);

		}
	});
	$.ajax({
		url:"controller/pendingController.php",
		type:"POST",
		data:{op:"pendingMAD"},async:false,
		success:function(data)
		{	var value=(data.data==null)?"0":data.data;
			value=parseFloat(value);
			$("#pendingmad").text(formatMoney(value.toFixed(2))).css("color",amounting(value));
		},
		error: function(xhr, status, error) {
				alert(xhr.responseText);
				console.log(xhr + " - " + status + " - " + error);

		}
	});
	$.ajax({
		url:"controller/pendingController.php",
		type:"POST",
		data:{op:"pendingUSD"},async:false,
		success:function(data)
		{	var value=(data.data==null)?"0":data.data;
			value=parseFloat(value);
			$("#pendingusd").text(formatMoney(value.toFixed(2))).css("color",amounting(value));
		},
		error: function(xhr, status, error) {

				console.log(xhr + " - " + status + " - " + error);

		}
	});
	var labels = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November","December"];
    var gainusd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    var gainmad = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
	var loseusd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    var losemad = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
	var gainyearusd = [];
    var gainyearmad = [];
	var loseyearusd = [];
    var loseyearmad = [];
	var gainyearusdamount = [];
    var gainyearmadamount = [];
	var loseyearusdamount = [];
    var loseyearmadamount = [];
	$.ajax({
		url:"controller/gainController.php",
		type:"POST",
		data:{op:"getMonthsByYear_USD"},async:false,
		success:function(data)
		{	
			data.data.forEach(function(d){
				gainusd[d.month - 1] = d.amount;
			});
		},
		error: function(xhr, status, error) {

				console.log(xhr + " - " + status + " - " + error);

		}
	});
	$.ajax({
		url:"controller/gainController.php",
		type:"POST",
		data:{op:"getMonthsByYear_MAD"},async:false,
		success:function(data)
		{	
			data.data.forEach(function(d){
				gainmad[d.month - 1] = d.amount;
			});
		},
		error: function(xhr, status, error) {

				console.log(xhr + " - " + status + " - " + error);

		}
	});
	$.ajax({
		url:"controller/loseController.php",
		type:"POST",
		data:{op:"getMonthsByYear_USD"},async:false,
		success:function(data)
		{	
			data.data.forEach(function(d){
				loseusd[d.month - 1] = d.amount;
			});
		},
		error: function(xhr, status, error) {

				console.log(xhr + " - " + status + " - " + error);

		}
	});
	$.ajax({
		url:"controller/loseController.php",
		type:"POST",
		data:{op:"getMonthsByYear_MAD"},async:false,
		success:function(data)
		{	
			data.data.forEach(function(d){
				losemad[d.month - 1] = d.amount;
			});
		},
		error: function(xhr, status, error) {

				console.log(xhr + " - " + status + " - " + error);

		}
	});
	/* Years */
	$.ajax({
		url:"controller/gainController.php",
		type:"POST",
		data:{op:"getYears_USD"},async:false,
		success:function(data)
		{	
			data.data.forEach(function(d){
				gainyearusdamount.push(d.amount);
				gainyearusd.push(d.year);
			});
		},
		error: function(xhr, status, error) {

				console.log(xhr + " - " + status + " - " + error);

		}
	});
	$.ajax({
		url:"controller/gainController.php",
		type:"POST",
		data:{op:"getYears_MAD"},async:false,
		success:function(data)
		{	
			data.data.forEach(function(d){
				gainyearmadamount.push(d.amount);
				gainyearmad.push(d.year);
			});
		},
		error: function(xhr, status, error) {

				console.log(xhr + " - " + status + " - " + error);

		}
	});
	$.ajax({
		url:"controller/loseController.php",
		type:"POST",
		data:{op:"getYears_USD"},async:false,
		success:function(data)
		{	
			data.data.forEach(function(d){
				loseyearusdamount.push(d.amount);
				loseyearusd.push(d.year);
			});
		},
		error: function(xhr, status, error) {

				console.log(xhr + " - " + status + " - " + error);

		}
	});
	$.ajax({
		url:"controller/loseController.php",
		type:"POST",
		data:{op:"getYears_MAD"},async:false,
		success:function(data)
		{	
			data.data.forEach(function(d){
				loseyearmadamount.push(d.amount);
				loseyearmad.push(d.year);
			});
		},
		error: function(xhr, status, error) {

				console.log(xhr + " - " + status + " - " + error);

		}
	});
	graph(labels,gainusd,"annualGainUSD","USD");
	graph(labels,gainmad,"annualGainMAD","MAD");
	graph(labels,loseusd,"annualLoseUSD","USD");
	graph(labels,losemad,"annualLoseMAD","MAD");
	graph2(labels,gainmad,losemad,"annualTotalMAD","MAD");
	graph2(labels,gainusd,loseusd,"annualTotalUSD","USD");
	graph3(loseyearusd,loseyearusdamount,"3","USD");
	graph3(loseyearmad,loseyearmadamount,"4","MAD");
	graph3(gainyearusd,gainyearusdamount,"2","USD");
	graph3(gainyearmad,gainyearmadamount,"1","MAD");
	
	
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
                                labelString: 'Month'
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
                                labelString: 'Month'
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
                                labelString: 'Year'
                            }
                        }]
                }
            }
        });

}