$(document).ready(function(){
	$('a.dropdown-toggle').click( function(event){
        event.stopPropagation();
        $('nav.nav-fullwidth').toggle();
    });
    $(document).click( function(){
        $('nav.nav-fullwidth').hide();
    });
});