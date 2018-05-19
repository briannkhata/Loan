/* ------------------------------------------------------------------------------
 *
 *  # User profile page
 *
 * ---------------------------------------------------------------------------- */

$(function() {

	// Form components
	// ------------------------------

	// Select2 selects
	$('.select').select2({
		minimumResultsForSearch: Infinity
	});


	// Styled file input
	$(".file-styled").uniform({
		fileButtonClass: 'action btn bg-teal-400'
	});


	// Styled checkboxes, radios
	$(".styled").uniform({
		radioClass: 'choice'
	});

});
