function treatPeriority(priority)
{
	if(priority=="1") return "Low Periority";
	else if(priority=="2") return "Medium Periority";
	else if(priority=="3") return "High Periority"
	else return "Error";
}
$(".nav-item").removeClass("active");
$(document).ready(function(){
	var table = $('#action_done').DataTable({

         "scrollX": true,

        "language": {

            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/English.json"

        },

        "ajax": {

            url: "controller/actionControllerAux.php",

            cache: false,

            dataSrc: 'data',

        },
        
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],

        "order": [[ 0, "desc" ]],

        "aaSorting": [],

        "columns": [

            { "data": "id" },

            { "data": "task" },

            { "data": "time" },

            { "data": "priority","render":function(data){return treatPeriority(data);} }

        ]

    });
});