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