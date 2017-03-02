<?php
	include 'WordCloud.php';
	$artist = $_GET['artist'];
	$word = $_GET['word']
	$provider = new WordCloud;
	$song_list = $provider->getSongsByWord($toSearch, $artist, 10);
	echo "ok";
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
		// $formattedArtistName = str_replace(" ","%20",$theArtist);
	    $formattedWord = $toSearch;
		for($x = 0; $x<count($songs); $x++){
	        $track_id = $songs[$x];
	        $song_title = $provider->getSongByTrackID($track_id);
			echo "<div id=\"songLink\"><a href=\"lyricsPage.php?artist=$artist&track_id=$track_id&word=$word\">$song_title</a></div>";
		}
	?>
<a href="index.html"><button id="back">Back</button></a>
</body>
</html>
	