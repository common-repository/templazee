var allElements = document.getElementsByTagName('*');

// Function to check if a class exists in the DOM
function doesClassExist(className) {
    // Iterate through all elements
    for (var i = 0; i < allElements.length; i++) {
        // Check if the current element contains the specified class
        if (allElements[i].classList.contains(className)) {
            return true; // Class found, return true
        }
    }
    return false; // Class not found in any element, return false
}

// Usage
var classNameToCheck = 'splide';
if (doesClassExist(classNameToCheck)) {
    var elms = document.getElementsByClassName( 'splide' );

    for ( var i = 0; i < elms.length; i++ ) {
      new Splide( elms[ i ] ).mount();
    }
}


jQuery( function($) {

	$('.templazee-tab-label').click(function(){
		$( "#templazee-tab[uniquie='"+this.getAttribute('data-uniquie')+"'] .templazee-tab-label" ).removeClass( 'active' );
        $( "#templazee-tab[uniquie='"+this.getAttribute('data-uniquie')+"'] .templazee-tab-label" ).addClass( 'inactive' );
		$(this).addClass('active');
        $(this).removeClass('inactive');
		$( "#templazee-tab-content[data-uniquie='"+this.getAttribute('data-uniquie')+"'] .wp-block-templazee-tabs").attr('data-tab-active','inactive');
		$( "#templazee-tab-content[data-uniquie='"+this.getAttribute('data-uniquie')+"'] .wp-block-templazee-tabs:nth-child("+this.getAttribute('data-id')+")").attr('data-tab-active','active');
	});
	
});