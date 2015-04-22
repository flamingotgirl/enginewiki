$(function() {
	// hide all the sub-menus
	$("span.toggle").next().show();
	$("b").html( "-" + $("b").html().substring( 1 ) );
	var opened = true;
	
	$("span.expand_all").click(function() {
		$("span.toggle").next().show();
		$("b").html( "-" + $("b").html().substring( 1 ) );
	});

	// set the cursor of the toggling span elements
	$("span.toggle").css("cursor", "pointer");
	$("span.expand_all").css("cursor", "pointer");
	
	// add a click function that toggles the sub-menu when the corresponding span element is clicked
	$("span.toggle").click(function() {
		if (opened == false) {
			$(this).next().toggle();
			opened = true;
		}
	});
	
	$("b").click(function() {
		$(this).next().toggle();
		// switch the plus to a minus sign or vice-versa
		var v = $(this).html().substring( 0, 1 );
		if ( v == "+")
			$(this).html( "-" + $(this).html().substring( 1 ) );
		else if ( v == "-")
			$(this).html( "+" + $(this).html().substring( 1 ) );
		opened = false;
	});
});