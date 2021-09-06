$(".nav-item").removeClass("active");
$(".dropdown").addClass("active");
$("a[href='pending']").addClass("active");
function update(id)
{
	var data = $.ajax({url:"controller/pendingController.php",type:"POST",data:{op:"findById",id:id},async:false}).responseText;
	data = JSON.parse(data);
	$("#amount").val(data.data.amount);
	$("#date").val(data.data.date);
	$("#type").val(data.data.type);
	$("#currency").val(data.data.currency);
	$("#target").val(data.data.target);
	$("#flow").val(data.data.flow);
	var warrently= (data.data.warrently==1)?true:false;
	$("#warrently").prop( "checked",warrently);
	$("#submit").text("Edit").attr("N","edit").attr("data-id",id);
	$("#annuler").show();
	window.scroll({
	  top: 0,
	  behavior: 'smooth'
	});
}
function voidInputs()
{
        $("#amount").val("");
		$("#date").val("");
		$("#type").val("");
		$("#currency").val("MAD");
		$("#target").val("bank");
		$("#flow").val("received");
		$("#warrently").prop("checked",false);
}
function complete(id)
{
	$.ajax({
		url:"controller/pendingController.php",
		type:"POST",
		data:{op:"complete",id:id},
		async:false,
				success:function(data)
				{	
					alertify.success("transfered successfully");
					setTimeout(function(){location.reload();},1000);
				},
				error: function(xhr, status, error) {
					alert(xhr.responseText);
					alertify.error("Something wrong try again");
					console.log(xhr + " - " + status + " - " + error);

				}
	});
}
function deleteit(id)
{
			$.ajax({
				url:"controller/pendingController.php",
				type:"POST",
				data:{op:"delete",id:id},
				async:false,
				success:function(data)
				{	
					alertify.success("deleted successfully");
					setTimeout(function(){location.reload();},1000);
				},
				error: function(xhr, status, error) {
					alert(xhr.responseText);
					alertify.error("Something wrong try again");
					console.log(xhr + " - " + status + " - " + error);

				}
			});
}
$(document).ready(function(){
	$("#submit").click(function(){
		if($(this).attr("N")=="add"){
		var amount = $("#amount").val();
		var date = $("#date").val();
		var type = $("#type").val();
		var warrently = (document.getElementById("warrently").checked===true)?1:0;
		var currency = $("#currency").val();
		var target = $("#target").val();
		var flow = $("#flow").val();
		var err=null;
		if((currency=="USD"&&target=="bank")||(currency=="MAD"&&target=="virtual"))
			{alertify.error("Currency is not valid for the target");err=1;}
		if(!isNumeric(amount)||!isPositiveFloat(amount))
			{alertify.error("Amount is not a postive numeric");err=1;}
		if(date===null || date==="")
			{alertify.error("Date is not valid");err=1;}
		if(flow===null || flow==="")
			{alertify.error("Flow is not valid");err=1;}
		if(type===null || type==="")
			{alertify.error("type is not valid");err=1;}
		if(type.length>100)
			{alertify.error("type is too long");err=1;}
		if(err===null)
			$.ajax({
				url:"controller/pendingController.php",
				type:"POST",
				data:{op:"add",amount:amount,type:type,date:date,currency:currency,warrently:warrently,target:target,flow:flow},
				async:false,
				success:function(data)
				{	
					alertify.success("added successfully");
					table.ajax.reload();
                    voidInputs();
				},
				error: function(xhr, status, error) {
					alert(xhr.responseText);
					alertify.error("Something wrong try apending");
					console.log(xhr + " - " + status + " - " + error);

				}
			});
		}
		else if($(this).attr("N")=="edit")
		{	
			var id = $(this).attr("data-id");
			var amount = $("#amount").val();
			var date = $("#date").val();
			var type = $("#type").val();
			var warrently = (document.getElementById("warrently").checked===true)?1:0;
			var currency = $("#currency").val();
			var target = $("#target").val();
			var flow = $("#flow").val();
			var err=null;
			if((currency=="USD"&&target=="bank")||(currency=="MAD"&&target=="virtual"))
				{alertify.error("Currency is not valid for the target");err=1;}
			if(!isNumeric(amount)||!isPositiveFloat(amount))
				{alertify.error("Amount is not a postive numeric");err=1;}
			if(date===null || date==="")
				{alertify.error("Date is not valid");err=1;}
			if(flow===null || flow==="")
				{alertify.error("Flow is not valid");err=1;}
			if(type===null || type==="")
				{alertify.error("type is not valid");err=1;}
			if(type.length>100)
				{alertify.error("type is too long");err=1;}
			if(err===null)
			$.ajax({
				url:"controller/pendingController.php",
				type:"POST",
				data:{op:"update",amount:amount,type:type,date:date,currency:currency,warrently:warrently,target:target,id:id,flow:flow},
				async:false,
				success:function(data)
				{
					alertify.success("updated successfully");
					table.ajax.reload();
                    $("#annuler").click();
				},
				error: function(xhr, status, error) {
					alert(xhr.responseText);
					alertify.error("Something wrong try apending");
					console.log(xhr + " - " + status + " - " + error);

				}
			});
		}
	});
	var table = $('#pending').DataTable({

         "scrollX": true,

        "language": {

            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/English.json"

        },

        "ajax": {

            url: "controller/pendingController.php",

            cache: false,

            dataSrc: 'data'

        },
        
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],

        "order": [[ 0, "desc" ]],

        "aaSorting": [],

        "columns": [

            { "data": "id" },

            { "data": "amount" },

            { "data": "currency" },

            { "data": "warrently","render":function(data){return (data=="1")?"Yes":"No";} },

            { "data": "target" },
			
			{ "data": "flow" },

            { "data": "type" },
			
			{ "data": "date" },
			
			{ "data": null,"render":function(data){return "<button onclick='update("+data.id+")' style='margin-right:5px;' class='btn btn-info'><i class='fa fa-refresh'></i></button><button onclick='complete("+data.id+")' style='margin-right:5px;' class='btn btn-info'><i class='fa fa-check'></i></button><button onclick='deleteit("+data.id+")' class='btn btn-danger'><i class='fa fa-trash'></i></button>"} }

        ]

    });
	$("#annuler").click(function(){
		voidInputs();
		$("#submit").text("Add").attr("N","add").attr("data-id",0);
		$("#annuler").hide();
	});
});