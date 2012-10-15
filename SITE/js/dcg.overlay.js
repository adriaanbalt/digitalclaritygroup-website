;(function($) {
	$.overlay = function() {

		root = this;

		var init = function(){
		}

		root.show = function(hash) {
			$('.overlay-container').show();
			$('.overlay').hide();
			$('#'+hash).show();
		}

		root.hide = function(hash) {
			$('.overlay-container').hide();
			$('.overlay').hide();
		}

		init();
	}


})(jQuery);