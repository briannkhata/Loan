/* ------------------------------------------------------------------------------
 *
 *  # Email marketing
 *
 * ---------------------------------------------------------------------------- */



$(function() {

	//*******************EMAIL TEMPLATES TAB*******************

	// Default initialization
	$('.wysihtml5-default').wysihtml5({
		parserRules:  wysihtml5ParserRules
	});

	// Simple toolbar
	$('.wysihtml5-min').wysihtml5({
		parserRules:  wysihtml5ParserRules,
		"font-styles": true, // Font styling, e.g. h1, h2, etc. Default true
		"emphasis": true, // Italics, bold, etc. Default true
		"lists": true, // (Un)ordered lists, e.g. Bullets, Numbers. Default true
		"html": false, // Button which allows you to edit the generated HTML. Default false
		"link": true, // Button to insert a link. Default true
		"image": false, // Button to insert an image. Default true,
		"action": false, // Undo / Redo buttons,
		"color": true // Button to change color of font
	});

	// Style form components
	$('.styled').uniform();




	//**********************CLIENT LIST TAB*******************

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
	$('.filter-select').select2();




});
