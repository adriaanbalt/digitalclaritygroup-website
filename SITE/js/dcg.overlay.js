;(function($) {
	$.overlay = function() {

		root = this;
		goTo = 0;

		var init = function(){
			goTo = $('#team').scrollTop();
		}

		root.show = function(hash) {
			gotoTeam();
			$('.overlay-container').show();
			$('.overlay').hide();
			$('#'+hash).show();
			$('body').addClass('has-overlay');
		}

		root.hide = function() {
			gotoTeam();
			$('.overlay-container').hide();
			$('.overlay').hide();
			$('body').removeClass('has-overlay');
		}

		var gotoTeam = function() {
			if ( $('body').hasClass('large') ) {
				goTo = 3450;
			} else if ( $('body').hasClass('medium') ) {
				goTo = 4700;
			} else if ( $('body').hasClass('small') ) {
				goTo = 4500;
			}
			$('body').scrollTop( goTo );
		}

		init();
	}


})(jQuery);