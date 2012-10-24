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

	$.youtubeplayer = function() {
 
 		var player = null;

		var getNewPlayerByID = function( videoID ) {
			player = new YT.Player( videoID, {
				width: '560',
				height: '315',
				videoId: videoID,
				events: {
					'onReady': onPlayerReady,
					'onStateChange': onPlayerStateChange
				},
				playerVars: {
					autoplay: 0,
					autohide: 1,
					rel: 0,
					hd: 1,
					modestbranding: 0,
					wmode: 'opaque'
				}
			});
		}

		var onPlayerReady = function(evt) {
			//evt.target.playVideo();
		}

		var onPlayerStateChange = function(evt) {
			if ( evt.data == YT.PlayerState.PLAYING ) {
				done = true;
			}
		}

		var init = function() {
			getPlaylist( 'PLI0CjHTl84BwYc3wF7lRASZyE0_htgHnk' );
		}

		var getPlaylist = function( id ) {
			$('#videoLoad').load( '	http://gdata.youtube.com/feeds/api/playlists/' + id + '?v=2', playLoadComplete );
		}

		var playLoadComplete = function( responseText, textStatus, XMLHttpRequest ) {
			var xml = $( XMLHttpRequest.responseXML.documentElement ),
				entry = xml.find( "entry" ),
				iterator = 0;

			entry.each( function() {
				if ( iterator < 5 ) {
					if ( iterator == 0 ){
						$('#videofeature').append( "<h3>" + $(this).find('title:eq(0)').text() + "</h3><div class='player' id='" + $(this).find('videoid').text() + "' data-listid='" + $(this).find('id').text().split(':')[3] + "'></div>" );
						getNewPlayerByID( $(this).find('videoid').text() );
						$('#videoplaylist ul').append( "<li class='video-entry active'><a href='javascript:void(0);' data-videoid='" + $(this).find('videoid').text() + "' data-listid='" + $(this).find('id').text().split(':')[3] + "'><h4>" + $(this).find('title:eq(0)').text()  + "</h4><div class='cover'></div><img src='" + $(this).find('thumbnail:eq(2)').attr('url') + "'/></a></li>")
					} else {
						$('#videoplaylist ul').append( "<li class='video-entry in-active'><a href='javascript:void(0);' data-videoid='" + $(this).find('videoid').text() + "' data-listid='" + $(this).find('id').text().split(':')[3] + "'><h4>" + $(this).find('title:eq(0)').text()  + "</h4><div class='cover'></div><img src='" + $(this).find('thumbnail:eq(2)').attr('url') + "'/></a></li>")
					}
					
					$('#videoplaylist ul li').on('click', 'a', function(e) {
						e.preventDefault();
						console.log ( "$(this) ", $(this) );
						if ( player !== null ) {
							player.loadVideoById( $(this).data('videoid'), 0, "default" );
							$(this).parents('#videoplaylist ul').find('.active').removeClass('active').addClass('in-active');
							$(this).parent().removeClass('in-active').addClass('active');
						}
					});

					iterator++;
				} else {
					return;
				}
			})
		}

		if ( $('#videoplayer').length > 0 ) {
			var tag = document.createElement('script');
			tag.async = true;
			tag.src = "http://www.youtube.com/player_api";
			var firstScriptTag = document.getElementsByTagName('script')[0];
			firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
		} else {
			init();
		}

		window.onYouTubePlayerAPIReady = function() {
			init();
		}; //.bind(plugin);
	}

	website = new $.website();
	ytPlayer = new $.youtubeplayer();
	overlay = new $.overlay();
	historyManager = new $.historyManager();

})(jQuery);
