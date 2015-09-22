//problem: no interactivity in the left menu
//solution: Add interactivity through a drop down menu for list items
//plan
  

$(document).ready(function () {

    $(".subnav_first").hide();
    var isSiblingHovered = false;
    $('.primarylink').hover(function () {
        $(this).next().slideDown();
        
                   
    },
        function () {
            var current = $(this);
            setTimeout(function () {
                if (!isSiblingHovered) {
                    current.siblings('.subnav_first').stop().slideUp();
                }
            }, 50);
        });

    $('body').on("mouseleave", ".subnav_first", function (e) {
        isSiblingHovered = false;
        $('.subnav_first').stop().slideUp();
        $('.subnav_second').stop().slideUp();
    });

    $('body').on("mouseenter", ".subnav_first", function () {
        isSiblingHovered = true;
    });
   
    $('.subnav_second').hide();
    
     $(".secondarylink").hover(function (e) {
                        e.preventDefault();
                       
                        $(this).next().slideDown();
                    }, function () {
                       
                        
                    });
                    
     $('.main-container').on('mouseleave', 'subnav_second', function(){
         $('.subnav_second').hide();
     })        

});
	
//Mobile Drop Down Functionality
$('.nav-drop-down-container').hide();
var toggleState = true;
$('.arrowicon').on('click', function () {

	if (toggleState) {
		$('.nav-drop-down-container').fadeIn();
	} else {
		$('.nav-drop-down-container').fadeOut();
	}
	toggleState = !toggleState;

});



$('.arrowicon').click(function(){
    $('.nav-drop-down-container').show();
});
	
	

