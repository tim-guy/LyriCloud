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
<div id="artist_title"><?php echo strtoupper($artist)?></div>
<div id="cloudResult">
<?php 
	echo $cloud;
?>
</div>

</body>
</html>