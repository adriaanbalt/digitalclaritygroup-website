<?php

//http://digitalclaritygroup.com/feed/
//http://api.twitter.com/1/statuses/user_timeline.rss?screen_name=Just_Clarity

	function getRSS( $url, $callback ) {
		$rss = new DOMDocument();
		$rss->load( $url );
		call_user_func( $callback, $rss );
	}


	function latestLoaded( $rss ) {
		$feed = array();
		foreach ($rss->getElementsByTagName('item') as $node) {
			// $img_links = array();
			// $dom = new DOMDocument();
			// $dom->loadHTML( $node->getElementsByTagNameNS( "*","encoded" )->item(0)->nodeValue );
			$item = array (
				'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
				'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
				'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue
				);
			array_push($feed, $item);
		}
		$limit = 5;
		$container = '';
		$i = 0;
		foreach( $feed as $item ) {
			if ( $i < $limit ) {
				$title = str_replace(' & ', ' &amp; ', $item['title']);
				$link = $item['link'];
				$dateArr = split(' ', $item['date']);
				$date = $dateArr[2] . ' ' . $dateArr[1] . ', ' . $dateArr[3];
				$container .=
				"<li class='". (((($x+1) % 4 == 0)&&($x!=0)) ? 'last' : '') . ($x==0 || $x == $rowLimit ? 'first' : '') ."'>
					<div class='inner'>
						<a href='".$link."' target='_blank' title='".$title."'>
							<p class='date'>".$date."</p>
							<p class='title'>".$title."</p>
						</a>
					</div>
				</li>";
			} else {
				break;
			}
			$i++;
		}
		print $container;
	}

	function thoughtsLoaded( $rss ) {
		$feed = array();
		$remove = false;
		foreach ($rss->getElementsByTagName('item') as $node) {
			$img_links = array();
			$dom = new DOMDocument();
			$dom->loadHTML( $node->getElementsByTagNameNS( "*","encoded" )->item(0)->nodeValue );

			foreach ( $node->getElementsByTagName('category') as $cate ) {
				if ( $cate->nodeValue == "Events" ) {
					$remove = true;
					break;
				} else if ( $cate->nodeValue == "News" ){
					$remove = true;
					break;
				} else {
					$remove = false;
				}
			}
			
			if ( $remove != true ){
				if ( $dom->getElementsByTagName('img')->length > 0 ){
					$linkArr = split('/', $node->getElementsByTagName('comments')->item(0)->nodeValue );
					$linkT = $linkArr[0] . '//' . $linkArr[2] . '/' . $linkArr[3];
					$item = array (
						'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
						'link' => $linkT,
						'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
						'image' => $dom->getElementsByTagName('img')->item(0)->getAttribute('src'),
						'author' => $node->getElementsByTagNameNS('*','creator')->item(0)->nodeValue,
						'description' => $node->getElementsByTagName('description')->item(0)->nodeValue,
						'content' => $node->getElementsByTagName( "content:encoded" )->item(0)->nodeValue
						);
				} else {
					$linkArr = split('/', $node->getElementsByTagName('comments')->item(0)->nodeValue );
					$linkT = $linkArr[0] . '//' . $linkArr[2] . '/' . $linkArr[3];
					$item = array (
						'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
						'link' => $linkT,
						'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
						//'image' => $dom->getElementsByTagName('img')->item(0)->getAttribute('src'),
						'author' => $node->getElementsByTagNameNS('*','creator')->item(0)->nodeValue,
						'description' => $node->getElementsByTagName('description')->item(0)->nodeValue,
						'content' => $node->getElementsByTagName( "content:encoded" )->item(0)->nodeValue
						);
				}
				array_push($feed, $item);
			}
		}

		$rowLimit = 4;
		$limit = $rowLimit * (floor(count($feed) / $rowLimit));
		$container = '';
		for($x=0;$x<$limit;$x++) {
			$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
			$link = $feed[$x]['link'];
			$dateArr = split(' ', $feed[$x]['date']);
			$date = $dateArr[2] . ' ' . $dateArr[1] . ', ' . $dateArr[3];
			$content = $feed[$x]['content'];
			$image = $feed[$x]['image'];
			$author = $feed[$x]['author'];
			if ( $x == 0 ){
				$container .= "<div class='row first'><div class='inner clearfix'>";
			}
			if ( $x % $rowLimit == 0 && $x != 0 ){
				$container .= "</div></div><div class='row'><div class='inner clearfix'>";
			}
			$container .=
			"<section class='". (((($x+1) % 4 == 0)&&($x!=0)) ? 'last' : '') . ($x==0 || $x == $rowLimit ? 'first' : '') ."'>
				<div class='inner'>
					<a href='".$link."' target='_blank' title='".$title."'>
						<p class='date'>".$date."</p>
						<p class='title'>".$title."</p>
						<img src='". $image ."'/>
						<p class='continue'>Continue Reading...</p>
						<p class='author'>Posted by ".$author."</p>
						<div class='share'>
							<div class='fb-like' data-href='" . $link . "' data-send='false' data-layout='button_count' data-width='100' data-show-faces='false' data-colorscheme='light' data-font='verdana'></div>
							<a href='https://twitter.com/share' class='twitter-share-button' data-url='" . $link . "' data-text='" . $title . "' data-via='justclarity' data-related='justclarity' data-hashtags='justclarity'>Tweet</a>

						</div>
					</a>
				</div>
			</section>";
		}
		print $container;
	}

?>
