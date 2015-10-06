
$(document).ready(function () {
// Re-Write this
/*  Then the navigation is really jolty.  I think we had a similar issue with the Spire Infants menu & you slowed everything down to make it more accessible?
[1:47:37 PM] Thomas Cooper: The final point with the menu too - can we have it so that it keeps the menu relevant to the active secondary or tertiary page open?
*/
 
			
			 // by default hide all child nodes
  $('div.left-nav ul.menu > li > ul').hide();
  
  
   
  // find li with a class of current-menu-item
  $currentnode = $('div.left-nav ul.menu li.current-menu-item');
  
  if ($currentnode.length){
    // there is a node with the class of current-menu-item so
    // check to see if it has children
    if ($currentnode.find('ul').length){
      // the current-menu-item node has children so show them
      $currentnode.find('ul').show();
    }
    else if (!$currentnode.parent().is('div.left-nav ul.menu')){
      // the current-menu-item node is a child so show siblings
      $currentnode.parent().show();
    }
  }
			
			
			
});

// Prevent #'s being added to the address bar
	        jQuery('.menu li').on('click', 'a', function(e) {
	        	if (jQuery(this).attr('href') == "#") {
	        		e.preventDefault();
	        	}
	        });

$( document ).ready(function()
	{
		$('#cssmenu').prepend('<div id="menu-button">Menu</div>');
		$('#cssmenu #menu-button').on('click', function()
			{
				var menu = $(this).next('ul');
				if (menu.hasClass('open'))
				{
					menu.removeClass('open');
				} else
				{
					menu.addClass('open');
				}
			});
	});

