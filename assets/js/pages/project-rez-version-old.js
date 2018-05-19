/* ------------------------------------------------------------------------------
 *
 *  # Project page
 *
 * ---------------------------------------------------------------------------- */



$(function() {

	// Override defaults Editable component
	// ------------------------------

	// Disable highlight
	$.fn.editable.defaults.highlight = false;

	// Output template
	$.fn.editableform.template = '<form class="editableform">' +
		'<div class="control-group">' +
		'<div class="editable-input"></div> <div class="editable-buttons"></div>' +
		'<div class="editable-error-block"></div>' +
		'</div> ' +
		'</form>'

	// Set popup mode as default
	$.fn.editable.defaults.mode = 'popup';

	// Buttons
	$.fn.editableform.buttons =
		'<button type="submit" class="btn bg-teal-400 btn-icon editable-submit"><i class="icon-check"></i></button>' +
		'<button type="button" class="btn btn-default btn-icon editable-cancel"><i class="icon-x"></i></button>';

	// Editable text field
	$('#textarea').editable({
		showbuttons: 'bottom'
	});


	
	// Defaults
	Dropzone.autoDiscover = false;

	// Multiple files
	$("#dropzone_multiple").dropzone({
		paramName: "file", // The name that will be used to transfer the file
		dictDefaultMessage: 'Drop files to upload <span>or CLICK</span>',
		maxFilesize: 0.1 // MB
	});
	

	// Datepicker
	$(".datepicker").datepicker({
		showOtherMonths: true,
		dateFormat: "d MM, y"
	});


	// Inline datepicker
	$(".datepicker-inline").datepicker({
		showOtherMonths: true,
		defaultDate: '07/26/2015'
	});


	// Switchery toggle
	var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
	elems.forEach(function(html) {
		var switchery = new Switchery(html);
	});


	// CKEditor
	CKEDITOR.replace( 'add-comment', {
		height: '200px',
		removeButtons: 'Subscript,Superscript',
		toolbarGroups: [
			{ name: 'styles' },
			{ name: 'editing',     groups: [ 'find', 'selection' ] },
			{ name: 'forms' },
			{ name: 'basicstyles', groups: [ 'basicstyles' ] },
			{ name: 'paragraph',   groups: [ 'list', 'blocks', 'align' ] },
			{ name: 'links' },
			{ name: 'insert' },
			{ name: 'colors' },
			{ name: 'tools' },
			{ name: 'others' },
			{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] }
		]
	});

});
