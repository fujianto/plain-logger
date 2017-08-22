/* global confirm, redux, redux_change */

jQuery(document).ready(function() {
	// hide unwanted settings api element
	jQuery('.field_plainLoggerArea').parent().prev().hide();
	jQuery('.field_plainLoggerArea').parent().parent().parent().parent().next().hide();

	jQuery('.logReader-clean').click(function(){
		var theButton 	= this;
		var theTarget 	= jQuery(this).data('target');
		jQuery.ajax({
			url     : ajaxurl,
			type    : "POST",
			data    : {
				action  : "plainLogger-log-clear",
				method  : "clean"   
			},
			beforeSend  : function(){
				jQuery(this).attr('disable',true);   
			},
			success     : function(response) {
				jQuery('#' + theTarget + ' .content').html('');
				jQuery(this).attr('disable',false);
			}
		});

		return false;
	});

	jQuery('.logReader-refresh').on('click', function(){
		var theButton 	= this;
		var theTarget 	= jQuery(this).data('target');

		jQuery.ajax({
			url     : ajaxurl,
			type    : "POST",
			data    : {
				action  : "plainLogger-log"
			},
			beforeSend  : function(){
				jQuery(this).attr('disable',true);   
			},
			success     : function(response) {
				jQuery('#' + theTarget + ' .content').html(response);
				jQuery(this).attr('disable',false);
			}
		});
	});
});
