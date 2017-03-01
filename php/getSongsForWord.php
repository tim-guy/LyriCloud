<?php

	//code for this song's page yet to be done. not too hard though.

	$urlBase = 'http://api.musixmatch.com/ws/1.1/';
	$apiKey = 'c68c8e440ab040696a20c467eb42ddc2';

	if($_POST['action'] == "searchForSongs") {
	  $toSearch = $_POST['specificWord']
	  $artist = $_POST['artistName'];
	  $artistNames = array( );
	  array_push($artistNames, $artist);

	  $song_list = getSongsByWord($toSearch, $artist, 10);
	  echo "ok";
	}

	// $toSearch = $_GET['word'];
	// $theArtist = $_GET['artist'];
	// $provider = new WordCloud;
	// $songs = array();
	// $songs = $provider->getSongsByWord($toSearch, $theArtist, 'http://www.metrolyrics.com/', 10);
	
	//this function will go into wordcloud.php
	function getSongsByWord($_word, $_artist, $upperSongLimit)
		{
			$artist = $_artist;
			$word = $_word;
			$artist = str_replace(" ", "-", $artist);
			$artist = strtolower($artist);

			//need to edit this part according to the new API
			$html = file_get_html($_site . $artist . '-lyrics.html');
			$song_links = array();
			$str = "";
		
			foreach ($html->find('a') as $element) {
				if (strpos($element, '-lyrics-' . $artist) !== false) {
					$song_links[] = $element->href;
				}
			}
		
			$song_size = count($song_links);
			if ($song_size > $upperSongLimit) {
				$song_size = $upperSongLimit;
			} 
		
			$array_songs = array();
			for ($x = 0; $x < $song_size; $x++) {
				$htmlsong = file_get_html($song_links[$x]);
				foreach ($htmlsong->find('div[id=lyrics-body-text]') as $lyrics) {
					$str = preg_replace("/\[([^\[\]]++|(?R))*+\]/", "", $lyrics);
					if (stripos($str, strtolower($word)) !== false || stripos($str, strtoupper($word)) !== false || stripos($str, $word) !== false) {
						foreach ($htmlsong->find('title') as $title) {
							$finaltitle = $this->get_string_between($title->plaintext, "-", "Lyrics");
							$array_songs[] = $finaltitle;
						}
					}
				}
			}
			return $array_songs;
		}
?>

<html>
<head>
<link rel="stylesheet" href="css/songs-page.css">
</head>
<header>
	<div id="header"><?php echo strtoupper($toSearch)?></div>
</header>
<body>
	<?php 
		$formattedArtistName = str_replace(" ","%20",$theArtist);
	    $formattedWord = $toSearch;
		for($x = 0; $x<count($songs); $x++){
	        $formattedSongName = $songs[$x];
			echo "<div id=\"songLink\"><a href=\"lyricsPage.php?artist=$formattedArtistName&song=$formattedSongName&word=$formattedWord\">$songs[$x]</a></div>";
		}
	?>
<a href="index.html"><button id="back">Back</button></a>
</body>
</html>
	