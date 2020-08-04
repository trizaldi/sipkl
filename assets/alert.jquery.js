/*!
 * jquery.alert
 *
 * @version 1.0
 *
 * @author Javier Sanahuja Liebana <javi_lcs16@hotmail.com>
 *
 * https://github.com/BanNsS1/jquery.alert/
 *
 */
 (function( $ ){
	$.createAlert = function(options){
		$(options.attachAfter).after(
			"<div id='alert_backdrop'></div>"+
			"<div id='alert_dialog'>"+
				"<div id='alert_title'></div>"+
				"<div id='alert_template'></div>"+
				"<div id='alert_actions'>"+
					"<button id='alert_confirm'></button>"+
				"</div>"+
				"<div id='alert_close'></div>"+
			"</div>"
		);
		
		$('#alert_title').html(options.title);
		$('#alert_template').html(options.template);
		$('#alert_confirm').html(options.confirmText);
		$('#alert_confirm').addClass(options.confirmStyle);
		
		if(typeof options.callback !== "undefined" && options.callback !== null)
			$('#alert_confirm').bind("click", options.callback);
			
		$('#alert_confirm').on('click', $.hideAlert);
		$('#alert_close').on('click', $.hideAlert);
		$(document).on('keyup', function(e){
			if (e.keyCode == 27){
				$.hideAlert();
			}
		});
		$(document).on('mouseu', function(e){
			var container = $("#alert_dialog");
			if (!container.is(e.target) && container.has(e.target).length === 0){
				$.hideAlert();
			}
		});
		
	};
	$.showAlert = function(){
		$('#alert_backdrop').slideDown();
		$('#alert_dialog').delay(100).fadeIn();
	};
	
	$.hideAlert = function(){
		$('#alert_backdrop').remove();
		$('#alert_dialog').remove();
	};
		
})( jQuery );