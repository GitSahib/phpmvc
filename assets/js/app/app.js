(function(){
	$(".submit").click(function(){
		var ajaxRequest = $("<input type='text' name='requestType' value='ajax'/>");
		var $form = $(this).closest("form");
		 $form.append(ajaxRequest);
		var data = $form.serializeArray();
		ajaxRequest.remove();
		if(validateTicket(data)){
			
			var notify = $.notify('<strong>Saving...</strong> Do not close this page...', {
				allow_dismiss: false,
				showProgressbar: true
			});
			$.ajax({
				type: "POST",
				data: data,
				dataType: "json",
				success: function(data) {
					if(/OK/.test(data.STATUS)){
						notify.update({'type': 'success', 'message': 
							'<strong>Success</strong> Your ticket has been saved!', 'progress': 100});
						$form.find("input,textarea").val('');
					}
				},
				error: function(data) {
					notify.update({'type': 'danger', 'message': 
						'<strong>Error</strong> A problem occured while saving the ticket', 'progress': 100});
				}
			});
		}
		else{
			var notify = $.notify('<strong>Saving...</strong> Do not close this page...', {
				allow_dismiss: false
			});
			notify.update({'type': 'danger', 'message': 
						'<strong>Error</strong> Invalid form'});		
		}
	});
	$(".dropdown-toggle").click(function(){
		$(this).closest("li").toggleClass("open");
	});
	var validateTicket = function(ticket){	
		for(var i = 0; i<ticket.length;i++){
			if(ticket[i].value == '')
			{
				return false;
			}
		}
		return true;
	}
	var table = $('.dataTable').DataTable( {
		dom: 'Bfrtip',
		fnInitComplete:function(){
			$(".btn-new").appendTo("div.dt-buttons");
			$("div.dt-buttons").css({float:'left'});
			
		},
		buttons: [
        'copy', 'excel', 'pdf'
    	]
	});
	table.on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
	$(".bulk_upload").click(function(){

	  var file = document.getElementById("data-file").files[0];
	  if(!file){
	  	return;
	  }
	  var reader = new FileReader();
	  reader.onload = function(progressEvent){
	    // Entire file
	    //console.log(this.result);
	    var linesArray = [];
	    // By lines
	    var lines = this.result.split('\n');
	    for(var lineNo = 0; lineNo < lines.length; lineNo++){
	    	if( lines[lineNo] == "" || /#############/.test(lines[lineNo])){continue;}
	      	linesArray.push(lines[lineNo]);
	    }
	    var tickets = [];
	    var i = 0;
	    var ticket = {};	    	
	    $(linesArray).each(function(index,line){
	    	if(/sk213d/.test(line)){
	    		ticket['branch_name'] = line.trim();
	    		i += 1;
	    	}
	    	else if(/PCR/.test(line)){
	    		ticket['icode_message'] = line.trim();
	    		i += 1;
	    	}
	    	else if(line.trim()[0] == '['){
	    		ticket['merge_message'] = line.trim();
	    		i += 1;
	    	}
	    	else if(/Open Issue/.test(line)){
	    		ticket['title'] = line.trim();
	    		i += 1;
	    	}
	    	if(i == 4){
	    		tickets.push(ticket);	
	    		i = 0;   
	    		ticket = {};	    	 		
	    		console.log(ticket);
	    	}
	    });
	    bulkUpload(tickets);
	  };
	  var bulkUpload = function(tickets){
	  	var notify = $.notify('<strong>Saving...</strong> Do not close this page...', {
			allow_dismiss: false,
			showProgressbar: true
		});
	  	$.ajax({
				type: "POST",
				url:'/home/ticket/create_bulk',
				data: {requestType :'ajax', tickets:tickets},
				dataType: "json",
				success: function(data) {
					if(/OK/.test(data.STATUS)){
						notify.update({'type': 'success', 'message': 
							'<strong>Success</strong> Your ticket has been saved!', 'progress': 100});
					}
				},
				error: function(data) {
					notify.update({'type': 'danger', 'message': 
						'<strong>Error</strong> A problem occured while saving the ticket', 'progress': 100});						
				}
			});
	  }
	  reader.readAsText(file);
	});
})();