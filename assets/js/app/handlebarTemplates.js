(function($){
	$('#search-dialog').dialog({
		autoOpen: false,
		dialogClass: 'fullshadow',
		title: 'Search - ',
		height: 400,
		width: 360,
		width: 394,
		modal: true,
		closeOnEscape: true,
		resizable: false
	});
	var context = {
		title: 'Search Something',
		tableId: 'something',
		headers: ['ID','Descriptions'],
		options: [{cells:['2','Test Description']}],
		type:'default'
	}
	var searchDialog = $('#search-dialog');
	$("#hbar-test").click(function(){
		getTemplate({templateFile:'search-dialog.html', context: context}).success(function(html) {
			// insert table with ticket type codes
			$searchDialog.html(html);
			// apply datatables with search filter
			$('#search-table').dataTable('destroy');
			$('#search-table').dataTable({
				'bDestroy': true,
				'bPaginate': false,
				'sDom': 'f',
				'bLengthChange': false
			});

			// apply click actions for all rows
			$.each(data.BMP_TKT_TYPE_CODES, function(index, sRow) {
				$('#search-table #search-table_Row_'+sRow.ID).die('click').live('click', function() {
					//some code
				});
			});
		});
	});
})(jQuery);
