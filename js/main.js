//problem: no interactivity in the left menu
//solution: Add interactivity through a drop down menu for list items
//plan
  if(!jQuery.browser.msie){jQuery("div.left-nav ul").css({opacity:"0.95"});}	// IE  - 2nd level Fix
	jQuery("div.left-nav  ul > li > ul").css({display: "none"});						// Opera Fix
	jQuery("ul.sub-menu").parent().append("<div>&nbsp;</div>"); //Only shows drop down trigger when js is enabled - Adds empty span tag after ul.subnav
	jQuery("ul.sub-menu li.menu-item").append("<span>&#187;</span>"); //Only shows drop down trigger when js is enabled - Adds empty span tag after ul.subnav
	jQuery("ul.menu li a").hover(function() { //When trigger is clicked...
		//Following events are applied to the subnav itself (moving subnav up and down)
		jQuery(this).parent().find("ul.sub-menu").slideDown('fast').show(400); //Drop down the subnav on hover
		jQuery(this).parent().hover(function() {
		}, function(){	
			jQuery(this).parent().find("ul.sub-menu").slideUp('slow'); //When the mouse hovers out of the subnav, move it back up
		});
		//Following events are applied to the trigger (Hover events for the trigger)
		}).hover(function() { 
			jQuery(this).addClass("subhover"); //On hover over, add class "subhover"
		}, function(){	//On Hover Out
			jQuery(this).removeClass("subhover"); //On hover out, remove class "subhover"
	});
/*
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
	
 
	*/
$( document ).ready(function() {
  $('#cssmenu').prepend('<div id="menu-button">Menu</div>');
  $('#cssmenu #menu-button').on('click', function(){
    var menu = $(this).next('ul');
    if (menu.hasClass('open')) {
      menu.removeClass('open');
    } else {
      menu.addClass('open');
    }
  });
});	

