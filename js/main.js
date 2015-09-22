//problem: no interactivity in the left menu
//solution: Add interactivity through a drop down menu for list items
//plan
  

$(document).ready(function () {

    $(".sub-menu").hide();
    var isSiblingHovered = false;
    $('div.left-nav  ul.menu .menu-item-has-children a').hover(function () {
        $(this).next().slideDown();
        
                   
    },
        function () {
            var current = $(this);
            setTimeout(function () {
                if (!isSiblingHovered) {
                    current.siblings('ul').stop().slideUp();
                }
            }, 50);
        });

    $('body').on("mouseleave", "div.left-nav  ul.menu  ul", function (e) {
        isSiblingHovered = false;
        $('div.left-nav  ul.menu   ul').stop().slideUp();
        $('div.left-nav  ul.menu   ul ul').stop().slideUp();
    });

    $('body').on("mouseenter", "div.left-nav  ul.menu  li ul", function () {
        isSiblingHovered = true;
    });
   
    $('div.left-nav  ul.menu  ul ').hide();
    
     $("div.left-nav  ul.menu  ul ").hover(function (e) {
                        e.preventDefault();
                       
                        $(this).next().slideDown();
                    }, function () {
                       
                        
                    });
                    
     $('.main-container').on('mouseleave', 'div.left-nav  ul.menu  ul ', function(){
         $('div.left-nav  ul.menu  ul').hide();
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
	
	

