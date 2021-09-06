$(".nav-item").removeClass("active");
$("a[href='action']").addClass("active");
var id_global=null;
function update(id)
{
	var data = $.ajax({url:"controller/actionController.php",type:"POST",data:{op:"findById",id:id},async:false}).responseText;
	data = JSON.parse(data);
	$("#task").val(data.data.task);
	$("#time").val(SQLtimeToJS(data.data.time));
	$("#priority").val(data.data.priority);
	$("#submit").text("Edit").attr("N","edit").attr("data-id",id);
	$("#annuler").show();
	window.scroll({
	  top: 0,
	  behavior: 'smooth'
	});
}
function voidInputs()
{
    $("#task").val("");
    $("#time").val("");
    $("#priority").val("1");
}
function treatPeriority(priority)
{
	if(priority=="1") return "Low Periority";
	else if(priority=="2") return "Medium Periority";
	else if(priority=="3") return "High Periority"
	else return "Error";
}
function SQLtimeToJS(time)
{
	var time1=time.split(" ")[0];
	var time2=time.split(" ")[1];
	var time3=time2.split(":")[0]+":"+time2.split(":")[1];
	return time1+"T"+time3;
}
function complete(id)
{	
	id_global=id;
	$("#confirmationmodal").show();
}
function deleteit(id)
{
			$.ajax({
				url:"controller/actionController.php",
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
		var task = $("#task").val();
		var time = $("#time").val();
		var priority = $("#priority").val();
		var err=null;
		if(time===null || time==="")
			{alertify.error("Time is not valid");err=1;}
		if(task===null || task==="")
			{alertify.error("Task is not valid");err=1;}
		if(priority===null || priority==="")
			{alertify.error("Priority is not valid");err=1;}
		if(task.length>1000)
			{alertify.error("Task is too long");err=1;}
		if(err===null)
			$.ajax({
				url:"controller/actionController.php",
				type:"POST",
				data:{op:"add",task:task,time:time,priority:priority},
				async:false,
				success:function(data)
				{	
					alertify.success("added successfully");
					table.ajax.reload();
                    voidInputs();
				},
				error: function(xhr, status, error) {
					alert(xhr.responseText);
					alertify.error("Something wrong try aaction");
					console.log(xhr + " - " + status + " - " + error);

				}
			});
		}
		else if($(this).attr("N")=="edit")
		{	
		var id = $(this).attr("data-id");
		var task = $("#task").val();
		var time = $("#time").val();
		var priority = $("#priority").val();
		var err=null;
		if(time===null || time==="")
			{alertify.error("Time is not valid");err=1;}
		if(task===null || task==="")
			{alertify.error("Task is not valid");err=1;}
		if(priority===null || priority==="")
			{alertify.error("Priority is not valid");err=1;}
		if(task.length>1000)
			{alertify.error("Task is too long");err=1;}
		if(err===null)
			$.ajax({
				url:"controller/actionController.php",
				type:"POST",
				data:{op:"update",task:task,time:time,priority:priority,id:id},
				async:false,
				success:function(data)
				{	
					alertify.success("updated successfully");
					table.ajax.reload();
                    $("#annuler").click();
				},
				error: function(xhr, status, error) {
					alert(xhr.responseText);
					alertify.error("Something wrong try aaction");
					console.log(xhr + " - " + status + " - " + error);

				}
			});
		}
	});
	var table = $('#action').DataTable({
        
        
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],

         "scrollX": true,

        "language": {

            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/English.json"

        },

        "ajax": {

            url: "controller/actionController.php",

            cache: false,

            dataSrc: 'data',

        },

        "order": [[ 0, "desc" ]],

        "aaSorting": [],

        "columns": [

            { "data": "id" },

            { "data": "task" },

            { "data": "time" },

            { "data": "priority","render":function(data){return treatPeriority(data);} },
			
			{ "data": null,"render":function(data){return "<button onclick='update("+data.id+")' style='margin-right:5px;' class='btn btn-info'><i class='fa fa-refresh'></i></button><button onclick='complete("+data.id+")' style='margin-right:5px;' class='btn btn-info'><i class='fa fa-check'></i></button><button onclick='deleteit("+data.id+")' class='btn btn-danger'><i class='fa fa-trash'></i></button>"} }

        ]

    });
	$("#annuler").click(function(){
		voidInputs();
		$("#submit").text("Add").attr("N","add").attr("data-id",0);
		$("#annuler").hide();
	});
	$("#completetask").click(function(){
		var id = id_global;
		$.ajax({
		url:"controller/actionController.php",
		type:"POST",
		data:{op:"done",id:id},
		async:false,
				success:function(data)
				{	
					alertify.success("task completed successfully");
					table.ajax.reload();
				},
				error: function(xhr, status, error) {
					alert(xhr.responseText);
					alertify.error("Something wrong try again");
					console.log(xhr + " - " + status + " - " + error);

				}
		});
		$("#confirmationmodal").hide();
	});
	$(".closeused").click(function(){
		$("#confirmationmodal").hide();
	});
});