/* ------------------------------------------------------------------------------
 *
 *  # Main menu management page
 *
 * ---------------------------------------------------------------------------- */



$(function() {

	// Main menu nodes
	$(".designer-menu-tree").fancytree({
		checkbox: true,
		selectMode: 2,
		extensions: ["edit", "dnd"],
		source: {
			url: "assets/js/pages/designer-menu-management.json"
		},
		edit: {
			adjustWidthOfs: 0,
			inputCss: {minWidth: "0"},
			triggerStart: ["f2", "dblclick", "shift+click", "mac+enter"],
			save: function(event, data) {
				alert("save " + data.input.val()); // Save data.input.val() or return false to keep editor open
			}
		},
		dnd: {
			autoExpandMS: 400,
			focusOnClick: true,
			preventVoidMoves: true, // Prevent dropping nodes 'before self', etc.
			preventRecursiveMoves: true, // Prevent dropping nodes on own descendants
			dragStart: function(node, data) {
				return true;
			},
			dragEnter: function(node, data) {
				return true;
			},
			dragDrop: function(node, data) {

				// This function MUST be defined to enable dropping of items on the tree.
				data.otherNode.moveTo(node, data.hitMode);
			}
		}
	});


	$(".save-designer-menu").on('click', function () {
		var tree = $(".designer-menu-tree").fancytree("getTree");
		var d = tree.toDict(true);
		console.log(JSON.stringify(d));
	})





});
