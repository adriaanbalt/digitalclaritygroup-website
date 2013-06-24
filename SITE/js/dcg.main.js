;(function($) {
	$.website = function( o ) {

		var root = this;

		// PUBLIC
		var init = function() {
			bindEvents();
			twitter();
		}

		var twitter = function() {
			var twit = $("#twitter .justclarity").tweet({
				avatar_size: 64,
				count: 6,
				username: ["just_clarity", "robert_rose", "Sliewehr", "cathymcknight", "tim_walters", "kyle_dover", "Esegar"],
				loading_text: "",
				refresh_interval: 120
			});
			$('#twitter .reload').on( 'click', function() {
				twit.trigger("tweet:load");
			});
		}

		var resize = function() {
			if ( $(window).width() > 1000 ){
				$('body').addClass('large');
				$('body').removeClass('medium');
				$('body').removeClass('small');
			} else if ( $(window).width() > 600 ){
				$('body').removeClass('large');
				$('body').addClass('medium');
				$('body').removeClass('small');
			} else if ( $(window).width() > 0 ){
				$('body').removeClass('large');
				$('body').removeClass('medium');
				$('body').addClass('small');
			}
		}

		var bindEvents = function() {
			resize();
			// $('#team').on( 'click', 'a', function(e){
			// 	// open the hash
			// });
			$(window).resize( resize );
			$(window).scroll( scrolling );
			$('#team section').on( 'click', 'a', function(e){
				e.preventDefault();
				overlay.show( $(this).attr('href').split('#').join('') );
			});
			$('.overlay').on( 'click', '.bg', function(e){
				e.preventDefault();
				overlay.hide();
			});
			$('.overlay').on( 'click', '.close', function(e){
				e.preventDefault();
				overlay.hide();
			});
		}

		// overlay

		var scrolling = function() {
			 var y = $(window).scrollTop();
			if( y > 300 ) {
			 	$('#goToTop').removeClass( 'hidden' );
			} else {
				$('#goToTop').addClass( 'hidden' );
			}
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
					'onStateChange': onPlayerStateChange,
					'onError':onPlayerError
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

		var onPlayerError = function(evt) {
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
			$('#videoLoad').load( 'http://gdata.youtube.com/feeds/api/playlists/' + id + '?v=2', playLoadComplete );
		}

		var playLoadComplete = function( responseText, textStatus, XMLHttpRequest ) {
			var xml = $( XMLHttpRequest.responseXML.documentElement ),
				entry = xml.find( "entry" ),
				iterator = 0,
				vidID = '';

			entry.each( function() {
				if ( iterator < 4 ) {
					vidID = $(this).find('videoid').text();
					if ( vidID == '' || vidID == undefined ) {
						vidID = $(this).find('yt\\:videoid').text();
					}
					thumbnailURL = $(this).find('thumbnail:eq(2)').attr('url');
					if ( thumbnailURL == undefined ){
						thumbnailURL = $(this).find('media\\:thumbnail:eq(2)').attr('url');
					}
					if ( iterator == 0 ){
						$('#videofeature').append( "<h3>" + $(this).find('title:eq(0)').text() + "</h3><div class='player' id='" + vidID + "' name='" + vidID + "' data-listid='" + $(this).find('id').text().split(':')[3] + "'></div>" );
						getNewPlayerByID( vidID );
						$('#videoplaylist ul').append( "<li class='video-entry active'><a href='javascript:void(0);' data-videoid='" + vidID + "' data-listid='" + $(this).find('id').text().split(':')[3] + "'><h4>" + $(this).find('title:eq(0)').text()  + "</h4><div class='cover'></div><img src='" + thumbnailURL + "'/></a></li>")
					} else {
						$('#videoplaylist ul').append( "<li class='video-entry in-active'><a href='javascript:void(0);' data-videoid='" + vidID + "' data-listid='" + $(this).find('id').text().split(':')[3] + "'><h4>" + $(this).find('title:eq(0)').text()  + "</h4><div class='cover'></div><img src='" + thumbnailURL + "'/></a></li>")
					}

					$('#videoplaylist ul li').on('click', 'a', function(e) {
						e.preventDefault();
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

	$.carousel = function() {

		var imageLoaded = function(e){
			console.log ( 'imageLoaded ', imgLoaded );
			imgLoaded++;
			if ( imgLoaded >= $('#carousel img').length ){
				complete();
			}
		}

		var complete = function() {
			$('#carousel').css('display','block');
			$('#carousel .carousel').carouFredSel({
				direction: 'left',
				responsive: true, // if the carousel is responsive
				width: '100%',
				scroll: {
					items: 1, // how many items to scroll at once
					duration: 500, // time it takes to animate
					timeoutDuration: 3000, // start after 3 seconds
					pauseOnHover: true
				},
				auto: {
					delay: 2000, // go to next after 2 seconds
					easing: 'swing',
					pauseOnEvent: true,
					pauseOnResize: true
				},
				pagination: {
					container: $('#carousel .pagination'), // retreives where the pagination should exist in the DOM
					anchorBuilder: function( nr ) {
						// builds a custom paginatin buttons
						return '<a href="#'+nr+'"><span></span></a>';
					}
				},
				swipe: {
					onMouse: true,
					onTouch: true // enables touch sliding control
				}
			});
			var wi = $('#carousel .pagination a').length * ( parseInt( $('#carousel .pagination a').width() ) + parseInt( $('#carousel .pagination a').css('margin-right') ) + parseInt( $('#carousel .pagination a').css('margin-left') ) + parseInt( $('#carousel .pagination a').css('padding-right') ) + parseInt( $('#carousel .pagination a').css('padding-left') ) );
			$('#carousel .pagination').width( wi );
		}

		var imgLoaded = 0;
		$('#carousel img').each( function() {
			// cached image
			if ( $(this)[0].complete || $(this)[0].readyState == 4 ) {
				imageLoaded();
			} else {
				$(this).load( imageLoaded );
			}
			// handles images that throw an error, the load doesn't skip these and proceeds
			$(this).on( 'error', imageLoaded );
		});
	};

	website = new $.website();
	ytPlayer = new $.youtubeplayer();
	overlay = new $.overlay();
	carousel = new $.carousel();

})(jQuery);
