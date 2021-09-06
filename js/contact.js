$(".nav-item").removeClass("active");
$("a[href='contact']").addClass("active");
var id_global=null;
function update(id)
{
	var data = $.ajax({url:"controller/contactController.php",type:"POST",data:{op:"findById",id:id},async:false}).responseText;
	data = JSON.parse(data);
	$("#name").val(data.data.name);
	$("#contact").val(data.data.contact);
	$("#contactType").val(data.data.contactType);
	$("#submit").text("Edit").attr("N","edit").attr("data-id",id);
	$("#annuler").show();
	window.scroll({
	  top: 0,
	  behavior: 'smooth'
	});
}
function voidInputs()
{
    $("#name").val("");
    $("#contact").val("");
    $("#contactType").val("Phone Number");
}
function deleteit(id)
{
			$.ajax({
				url:"controller/contactController.php",
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
		var name = $("#name").val();
		var contact = $("#contact").val();
		var contactType = $("#contactType").val();
		var err=null;
		if(name===null || name==="")
			{alertify.error("Name is not valid");err=1;}
		if(contact===null || contact==="")
			{alertify.error("Contact is not valid");err=1;}
		if(contactType===null || contactType==="")
			{alertify.error("Contact type is not valid");err=1;}
		if(contact.length>255)
			{alertify.error("Contact is too long");err=1;}
		if(err===null)
			$.ajax({
				url:"controller/contactController.php",
				type:"POST",
				data:{op:"add",name:name,contact:contact,contactType:contactType},
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
		var name = $("#name").val();
		var contact = $("#contact").val();
		var contactType = $("#contactType").val();
		var err=null;
		if(name===null || name==="")
			{alertify.error("Name is not valid");err=1;}
		if(contact===null || contact==="")
			{alertify.error("Contact is not valid");err=1;}
		if(contactType===null || contactType==="")
			{alertify.error("Contact type is not valid");err=1;}
		if(contact.length>255)
			{alertify.error("Contact is too long");err=1;}
		if(err===null)
			$.ajax({
				url:"controller/contactController.php",
				type:"POST",
				data:{op:"update",name:name,contact:contact,contactType:contactType,id:id},
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
	var table = $('#contactTable').DataTable({

         "scrollX": true,

        "language": {

            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/English.json"

        },

        "ajax": {

            url: "controller/contactController.php",

            cache: false,

            dataSrc: 'data',

        },
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],

        "order": [[ 0, "desc" ]],

        "aaSorting": [],

        "columns": [

            { "data": "id" },

            { "data": "name" },

            { "data": "contact" },

            { "data": "contactType" },
			
			{ "data": null,"render":function(data){return "<button onclick='update("+data.id+")' style='margin-right:5px;' class='btn btn-info'><i class='fa fa-refresh'></i></button><button onclick='deleteit("+data.id+")' class='btn btn-danger'><i class='fa fa-trash'></i></button>"} }

        ]

    });
	$("#annuler").click(function(){
		voidInputs();
		$("#submit").text("Add").attr("N","add").attr("data-id",0);
		$("#annuler").hide();
	});
});