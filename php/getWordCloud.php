<?php
	include 'WordCloud.php';

	if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST' && $_POST['name'] != '') {
		$artist = $_POST['name'];
		$provider = new WordCloud;
		$cloud = $provider->WordCloudGenerator($artist);
	}
	else{
		$cloud = null;
	}
?>

<html>
<body>

<div id="cloudResult">
<?php 
	echo $cloud;
	//echo "<div class=\"hiddenText\" id=\"prevText\">$text</div>";
?>
</div>

</body>
</html>