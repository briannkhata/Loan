/* ------------------------------------------------------------------------------
 *
 *  # Main menu management page
 *
 * ---------------------------------------------------------------------------- */



$(function() {

	// Table setup
	// ------------------------------

	// Setting datatable defaults
	$.extend( $.fn.dataTable.defaults, {
		autoWidth: false,
		"bSort": false,
		columnDefs: [{
			orderable: false,
			width: '100px',
			// targets: [ 5 ]
		}],
		dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
		language: {
			search: '<span>Filter:</span> _INPUT_',
			lengthMenu: '<span>Show:</span> _MENU_',
			paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
		},
		drawCallback: function () {
			$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
		},
		preDrawCallback: function() {
			$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
		}
	});


	// Single row selection
	var singleSelect = $('.datatable-selection-single').DataTable();
	$('.datatable-selection-single tbody').on('click', 'tr', function() {
		if ($(this).hasClass('success')) {
			$(this).removeClass('success');
		}
		else {
			singleSelect.$('tr.success').removeClass('success');
			$(this).addClass('success');
		}
	});


	// External table additions
	// ------------------------------

	// Add placeholder to the datatable filter option
	$('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');


	// Enable Select2 select for the length option
	$('.dataTables_length select').select2({
		minimumResultsForSearch: Infinity,
		width: 'auto'
	});


	// Enable Select2 select for individual column searching
	$('.filter-select').select2()

});
