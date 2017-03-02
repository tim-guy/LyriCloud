<?php

	include 'WordCloud.php';
	$artist = $_GET['artist'];
	$provider = new WordCloud;
	$cloud = $provider->getWordCloud($artist);
	
?>

<html>
<body>

<div id="cloudResult">
<?php 
	echo $cloud;
	echo "<div class=\"hiddenText\" id=\"prevText\">$text</div>";
?>
</div>

</body>
</html>