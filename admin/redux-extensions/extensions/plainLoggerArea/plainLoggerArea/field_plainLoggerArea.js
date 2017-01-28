/* global confirm, redux, redux_change */

jQuery(document).ready(function() {
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
});
