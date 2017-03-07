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
	
})();