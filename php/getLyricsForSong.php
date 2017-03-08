<?php

include 'WordCloud.php';
$artist = $_GET['artist'];
$track_id =  $_GET['track_id'];
$word = $_GET['word'];
$provider = new WordCloud;
$lyrics = $provider->getLyricsForSong($artist, $track_id, $word);
$song = $provider->getSongByTrackID($track_id);
$lyrics = preg_replace("/\w*?".preg_quote($word)."\w*/i", "<span class='highlight'>$0</span>", $lyrics);
?>

<html>
<head>
	<link rel="stylesheet" href="../css/lyrics-page.css">
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
		<?php echo "<a href=\"php/getSongsForWord.php?artist={$artist}&word={$word}\"><button id=\"songSelection\">Song Selection</button></a>" ?> 
		<a href="index.html"><button id="home">Word Cloud</button></a>
	</div>
</body>
</html>