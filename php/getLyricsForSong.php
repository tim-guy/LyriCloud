<?php

	//code for this lyrics'g page yet to be done. not too hard though.

	$urlBase = 'http://api.musixmatch.com/ws/1.1/';
	$apiKey = 'c68c8e440ab040696a20c467eb42ddc2';

	if($_POST['action'] == "searchForLyrics") {
	  $toSearch = $_POST['specificWord']
	  $artist = $_POST['artistName'];
	  $trackID = $_POST['track_id']
	  
	  $songLyrics = getLyricsForSong($artist, $trackID, $toSearch);
	  $songLyrics = preg_replace("/\w*?".preg_quote($keyword)."\w*/i", "<span class='highlight'>$0</span>", $lyrics);
	  echo "ok";
	}


	//this function will go into wordcloud.php
	function getLyricsForSong($_artist, $_track_id, $_word) {
		// first get track ids
		$query_type = "track.lyrics.get";
		$track_id = "?track_id=" . _track_id;
		$query = $urlBase . $query_type . $track_id . '&apikey=' . $apiKey;
		$response = file_get_contents($query);
		$response = json_decode($response, true);
		$lyrics_body = $response["message"]["body"]["lyrics"]["lyrics_body"];
		return $lyrics_body;
	}
?>

<html>
<head>
	<link rel="stylesheet" href="css/lyrics-page.css">
</head>
<body>
	<header>
		<div id="header"><?php echo $song ?></div>
		<div id="artist"><?php echo $artist ?></div>
	</header>
	<div id="lyrics">
		<?php echo $lyrics ?>
	</div>
	<div id="buttons">
		<?php echo "<a href=\"getSongsForWord.php?artist=$artist&word=$toSearch\"><button id=\"songSelection\">Song Selection</button></a>" ?> 
		<a href="index.html"><button id="home">Word Cloud</button></a>
	</div>
</body>
</html>

