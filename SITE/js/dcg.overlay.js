;(function($) {
	$.overlay = function() {

		root = this;

		var init = function(){
		}

		root.show = function(hash) {
			$('.overlay-container').show();
			$('.overlay').hide();
			$('#'+hash).show();
			$('body').addClass('has-overlay');
		}

		root.hide = function(hash) {
			$('.overlay-container').hide();
			$('.overlay').hide();
			$('body').removeClass('has-overlay');
		}

		init();
	}


})(jQuery);