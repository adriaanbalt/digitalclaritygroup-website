<?php

//http://digitalclaritygroup.com/feed/
//http://api.twitter.com/1/statuses/user_timeline.rss?screen_name=Just_Clarity

	function getRSS( $url, $callback ) {
		$rss = new DOMDocument();
		$rss->load( $url );
		call_user_func( $callback, $rss ); 
	}

	function thoughtsLoaded( $rss ) {
		$feed = array();
		foreach ($rss->getElementsByTagName('item') as $node) {
			$item = array ( 
				'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
				'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
				'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
				'image' => $node->getElementsByTagName('image')->item(0)->nodeValue,
				'author' => $node->getElementsByTagName('dc:creator')->item(0)->nodeValue
				);
			array_push($feed, $item);
		}
		$rowLimit = 4;
		$limit = $rowLimit * (floor(count($feed) / $rowLimit));
		$container = '';
		for($x=0;$x<$limit;$x++) {
			$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
			$link = $feed[$x]['link'];
			$date = 'March 20, 2012';
			if ( $x == 0 ){
				$container .= "<div class='row'><div class='inner clearfix'>";
			}
			if ( $x % $rowLimit == 0 && $x != 0 ){
				$container .= "</div></div><div class='row'><div class='inner clearfix'>";
			}
			$container .= 
			"<section class='". (((($x+1) % 4 == 0)&&($x!=0)) ? 'last' : '') . ($x==0 || $x == $rowLimit ? 'first' : '') ."'>
				<div class='inner'>
					<div class='border'>
						<a href='".$link."' target='_blank' title='".$title."'>
							<p>".$date."</p>
							<p>".$title."</p>
							<img src='". $image ."'/>
							<p>Continue Reading...</p>
							<p>".$author."</p>
						</a>
					</div>
				</div>
			</section>";
		}
		print $container;
	}

?>
