(function($) {
	$.historyManager = function() {

		root = this;

		var init = function(){
			$.history.init(root.parseHash);
		}

		root.parseHash = function(hash) {
			if ( confirmHash( hash ) ) overlay.show( hash );
			else overlay.hide();
		}

		var confirmHash = function( hash ) {
			var ret = false;
			if ( hash == 'thoughts' ){
				ret = false;
			} else if ( hash == 'story' ){
				ret = false;
			} else if ( hash == 'contact' ){
				ret = false;
			} else if ( hash == 'latest' ){
				ret = false;
			} else if ( hash != '' ) {
				ret = true;
				$(window).scrollTop(0);
			}

			return ret;
		}

		init();
	}


})(jQuery);