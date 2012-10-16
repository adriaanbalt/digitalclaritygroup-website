;(function($) {
	$.website = function( o ) {

		var root = this;

		// PUBLIC
		var init = function() {
			bindEvents();
			twitter();
		}

		var twitter = function() {
			$("#twitter .cathymcknight").tweet({
				avatar_size: 64,
				count: 3,
				username: ["cathymcknight"],
				loading_text: "Loading Twitter feed...",
				refresh_interval: 120
			});
			var twit = $("#twitter .justclarity").tweet({
				avatar_size: 64,
				count: 5,
				username: ["just_clarity"],
				loading_text: "",
				refresh_interval: 120
			});
			$('#twitter .reload').on( 'click', function() {
				console.log ( 'clicked ', twit );
				twit.trigger("tweet:load");
			});
		}

		var resize = function() {
		}

		var bindEvents = function() {
			resize();
			// $('#team').on( 'click', 'a', function(e){
			// 	// open the hash
			// });
			$(window).resize( resize );
			$(window).scroll( scrolling );
			// $('.overlay').on( 'click', '.bg', function(){
			// 	historyManager.parseHash('');
			// });
		}

		// overlay

		var scrolling = function() {
			// var y = $(window).scrollTop(),
			// 	showTopNav = ( $('header').height() + parseInt( $('header').css('margin-top').split('px').join('')) );
			// if( y > showTopNav ) {
			// 	$('#top-nav').removeClass( 'hidden' );
			// } else {
			// 	$('#top-nav').addClass( 'hidden' );
			// }
		}

		init();
	};

	website = new $.website();
	overlay = new $.overlay();
	historyManager = new $.historyManager();

})(jQuery);
