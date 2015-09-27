
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

$('body').on("mouseleave", "div.left-nav  ul.menu  ul.submenu", function (e) {
isSiblingHovered = false;
$('div.left-nav  ul.menu   ul.sub-menu').stop().slideUp();
$('div.left-nav  ul.menu   ul.sub-menu ul.sub-menu').stop().slideUp();
});

$('body').on("mouseenter", "#sidebar div.left-nav  ul.menu  ul.sub-menu", function () {
isSiblingHovered = true;
});

$('#sidebar div.left-nav  ul.menu  ul.sub-menu ').hide();

$("#sidebar div.left-nav   ul.menu ul.sub-menu ").hover(function (e) {
e.preventDefault();

$(this).next().slideDown();
}, function () {


});

$('.main-container').on('mouseleave', '#sidebar div.left-nav  ul.menu  ul ', function(){
$('div.left-nav  ul.menu  ul.sub-menu').hide();
})

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

