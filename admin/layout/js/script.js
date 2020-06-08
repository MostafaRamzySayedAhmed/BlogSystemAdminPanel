$(document).ready(function() {
	
	'use strict';
	
	// Hiding The Placeholder On Focusing & Showing It On Bluring
	
	$('[placeholder]').focus(function() {
		
		$(this).attr('data-text', $(this).attr('placeholder'));
		
		$(this).attr('placeholder', '');
		
	}).blur(function() {
		
		$(this).attr('placeholder', $(this).attr('data-text'));
		
	});
	
	// Dashboard Viewing Options
	
	$('.toggle-info').click(function () {

		$(this).toggleClass('selected').parent().next('.panel-body').fadeToggle(200);

		if ($(this).hasClass('selected')) {

			$(this).html('<i class="fa fa-minus fa-lg"></i>');

		} else {

			$(this).html('<i class="fa fa-plus fa-lg"></i>');

		}

	});
	
	// Confirmation Message On Deleting Button
	
	$('.user-delete').click(function() {
		
		return confirm("Are You Sure You Want To Delete This User ?");
		
	});
    
    $('.post-delete').click(function() {
		
		return confirm("Are You Sure You Want To Delete This Post ?");
		
	});
    
    $('.category-delete').click(function() {
		
		return confirm("Are You Sure You Want To Delete This Category ?");
		
	});
    
    $('.comment-delete').click(function() {
		
		return confirm("Are You Sure You Want To Delete This Comment ?");
		
	});
	
});	