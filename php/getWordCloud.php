<?php
	$urlBase = 'http://api.musixmatch.com/ws/1.1/';
	$apiKey = 'c68c8e440ab040696a20c467eb42ddc2';

	if($_POST['action'] == "submit") {
	  $artist = $_POST['artistName'];
	  $artistNames = array( );
	  array_push($artistNames, $artist);

	  $lyrics = getLyrics($artist);

	  echo "ok";
	}

	function getLyrics($artist) {
		// first get track ids
		$query_type = "track.search";
		$artist_name = "?q_artist=" . $artist;
		$query = $urlBase . $query_type . $artist_name . '&apikey=' . $apiKey;
		$response = file_get_contents($query);
		$response = json_decode($response, true);
		$track_list = $response["message"]["body"]["track_list"];
		$track_ids = array( );
		foreach ($track_list as $track) {
			array_push($track_ids, $track["track"]["track_id"]);
		}

		// second get all the long strings of lyrics for each track
		$query_type = "track.lyrics.get";
		$lyrics_list = array( );
		foreach ($track_ids as $id_key => $id) {
			$track_id = "?track_id=" . $id;
			$query = $urlBase . $query_type . $track_id . '&apikey=' . $apiKey;
			$response = file_get_contents($query);
			$response = json_decode($response, true);
			array_push($lyrics_list, $response["message"]["body"]["lyrics"]["lyrics_body"]);
		}

		// turn these long lists of lyrics into a single array that is split by a space delimiter
		$lyrics = array( );
		foreach ($lyrics_list as $string_id => $lyric_string) {
			$lyric_array = explode(" ", $lyric_string);
			foreach ($lyric_array as $word_id => $word) {
				array_push($lyrics, $word);
			}
		}
		
		return $lyrics;
	}
?>