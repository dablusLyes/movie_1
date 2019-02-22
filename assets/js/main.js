$(document).ready( function(){

	// Collapse filters===>

	let searchForm = $('#search_form');
	let toggle = $('.toggle');

	searchForm.hide();
	toggle.on("click", function(){
		searchForm.toggle()
	})



})