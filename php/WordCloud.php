<?php

class WordCloud


{
    /* Builds an array of words with all stop words filtered out. (case-insensitive) */
    function filter_words($words) {
        $bad_words = "'he', 'she', 'they', 'them', 'they', 'and', 'the', 'I', 'me', 'thislyricsisnotforcommercialuse'";
        $bad_words = explode(",", $bad_words);
        foreach ($words as $pos => $word) {
            if (!in_array(strtolower($word), $bad_words, TRUE)) {
                $filtered_words[$pos] = $word;
            }
        }
        return $filtered_words;
    }
    /* Builds an array of words as keys and their frequency as the value. (case-insensitive) */
    function word_freq($words) {
        $frequency_list = array();
        foreach ($words as $pos => $word) {
            $word = strtolower($word);
            if (array_key_exists($word, $frequency_list)) {
                ++$frequency_list[$word];
            }
            else {
                $frequency_list[$word] = 1;
            }
        }
        return $frequency_list;
    }
   
    /* Builds the word cloud and returns a string containing a div of the word cloud. */
    function word_cloud($words, $name) {
        $tags = 0;
        $cloud = "<div id=\"innerCloud\">";
        
        /* This word cloud generation algorithm was taken from the Wikipedia page on "word cloud"
           with some minor modifications to the implementation */
        
        /* Initialize some variables */
        $fmax = 96; /* Maximum font size */
        $fmin = 8; /* Minimum font size */
        $tmin = min($words); /* Frequency lower-bound */
        $tmax = max($words); /* Frequency upper-bound */
        foreach ($words as $word => $frequency) {
        
            if ($frequency > $tmin) {
                $font_size = floor(  ( $fmax * ($frequency - $tmin) ) / ( $tmax - $tmin )  );
                /* Define a color index based on the frequency of the word */
                $r = $g = 0; $b = floor( 255 * ($frequency / $tmax) );
                $color = '#' . sprintf('%02s', dechex($r)) . sprintf('%02s', dechex($g)) . sprintf('%02s', dechex($b));
            }
            else {
                $font_size = 0;
            }
            
            if ($font_size >= $fmin) {
                $cloud .= "<a href=\"specificWord.php?artist={$name}&word={$word}\" style=\"font-size: {$font_size}px; color: $color;\">$word</a> ";
                $tags++;
            }
        }
        
        $cloud .= "</div>";
        
        return array($cloud, $tags);  
    }

    function getLyricsForArtistt($artist) {
        $urlBase = 'http://api.musixmatch.com/ws/1.1/';
        $apiKey = 'c68c8e440ab040696a20c467eb42ddc2';
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
        //$lyrics = array( );
        $lyrics = "";
        foreach ($lyrics_list as $string_id => $lyric_string) {
            $lyric_array = explode(" ", $lyric_string);
            foreach ($lyric_array as $word_id => $word) {
                //array_push($lyrics, $word);
                $lyrics = $lyrics.$word;
            }
        }
        
        return $lyrics;
    }

    function WordCloudGenerator($artist_name){
        
        $provider = new WordCloud;
        $text = $provider->getLyricsForArtistt($artist_name);
        $words = str_word_count($text, 1); /* Generate list of words */
        $word_count = count($words); /* Word count */
        $unique_words = count( array_unique($words) ); /* Unique word count */
        $words_filtered = $provider->filter_words($words); /* Filter out stop words from the word list */
        $word_frequency = $provider->word_freq($words); /* Build a word frequency list */
        $word_c = $provider->word_cloud($word_frequency, $artist_name); /* Generate a word cloud and get number of tags */
        $word_cloud = $word_c[0]; /* The word cloud */
        $tags = $word_c[1]; /* The number of tags in the word cloud*/

        return $word_cloud;
    }
    
    function getLyricsForSong($_artist, $_track_id, $_word) {
        // first get track ids
        $urlBase = 'http://api.musixmatch.com/ws/1.1/';
        $apiKey = 'c68c8e440ab040696a20c467eb42ddc2';
        $query_type = "track.lyrics.get";
        $track_id = "?track_id=" . _track_id;
        $query = $urlBase . $query_type . $track_id . '&apikey=' . $apiKey;
        $response = file_get_contents($query);
        $response = json_decode($response, true);
        $lyrics_body = $response["message"]["body"]["lyrics"]["lyrics_body"];
        return $lyrics_body;
    }

    function getSongByTrackID($_track_id){
        $urlBase = 'http://api.musixmatch.com/ws/1.1/';
        $apiKey = 'c68c8e440ab040696a20c467eb42ddc2';
        $query_type = "track.get";
        $track_id = "?track_id=" . _track_id;
        $query = $urlBase . $query_type . $track_id . '&apikey=' . $apiKey;
        $response = file_get_contents($query);
        $response = json_decode($response, true);
        $song_title = $response["message"]["body"]["track"]["track_name"];
        return $song_title;
    }
}

?>