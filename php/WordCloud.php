<?php
class WordCloud
{
    $urlBase = 'http://api.musixmatch.com/ws/1.1/';
    $apiKey = 'c68c8e440ab040696a20c467eb42ddc2';

    $stopwords = "able,about,above,according,accordingly,across,actually,after,afterwards,again,against,ain't,all,allow,allows,
    almost,alone,along,already,also,although,always,am,among,amongst,an,and,another,any,anybody,anyhow,anyone,anything,anyway,
    anyways,anywhere,apart,appear,appreciate,appropriate,are,aren't,around,as,aside,ask,asking,associated,at,available,away,awfully,
    be,became,because,become,becomes,becoming,been,before,beforehand,behind,being,believe,below,beside,besides,best,better,between,
    beyond,both,brief,but,by,br,c'mon,c's,class,came,can,can't,cannot,cant,cause,causes,certain,certainly,changes,clearly,co,com,come,
    comes,concerning,consequently,consider,considering,contain,containing,contains,corresponding,could,couldn't,course,currently,
    definitely,described,despite,did,didn't,different,do,does,doesn't,doing,don't,done,down,downwards,during,each,edu,eg,eight,either,
    else,elsewhere,enough,entirely,especially,et,etc,even,ever,every,everybody,everyone,everything,everywhere,ex,exactly,example,
    except,far,few,fifth,first,five,followed,following,follows,for,former,formerly,forth,four,from,further,furthermore,get,gets,
    getting,given,gives,go,goes,going,gone,got,gotten,greetings,had,hadn't,happens,hardly,has,hasn't,have,haven't,having,he,he's,
    hello,help,hence,her,here,here's,hereafter,hereby,herein,hereupon,hers,herself,hi,him,himself,his,hither,hopefully,how,howbeit,
    however,i'd,i'll,i'm,i've,ie,if,ignored,immediate,in,inasmuch,inc,indeed,indicate,indicated,indicates,inner,insofar,instead,into,
    inward,is,isn't,it,it'd,it'll,it's,its,itself,just,keep,keeps,kept,know,knows,known,last,lately,later,latter,latterly,least,less,
    lest,let,let's,like,liked,likely,little,look,looking,looks,ltd,mainly,many,may,maybe,me,mean,meanwhile,merely,might,more,moreover,
    most,mostly,much,must,my,myself,name,namely,nd,near,nearly,necessary,need,needs,neither,never,nevertheless,new,next,nine,no,nobody,
    non,none,noone,nor,normally,not,nothing,novel,now,nowhere,obviously,of,off,often,oh,ok,okay,old,on,once,one,ones,only,onto,or,other,
    others,otherwise,ought,our,ours,ourselves,out,outside,over,overall,own,particular,particularly,per,perhaps,placed,please,plus,
    possible,presumably,probably,provides,que,quite,qv,rather,rd,re,really,reasonably,regarding,regardless,regards,relatively,respectively,
    right,said,same,saw,say,saying,says,second,secondly,see,seeing,seem,seemed,seeming,seems,seen,self,selves,sensible,sent,serious,seriously,
    seven,several,shall,she,should,shouldn't,since,six,so,some,somebody,somehow,someone,something,sometime,sometimes,somewhat,somewhere,
    soon,sorry,specified,specify,specifying,still,sub,such,sup,sure,t's,take,taken,tell,tends,th,than,thank,thanks,thanx,that,that's,thats,
    the,their,theirs,them,themselves,then,thence,there,there's,thereafter,thereby,therefore,therein,theres,thereupon,these,they,they'd,they'll,
    they're,they've,think,third,this,thorough,thoroughly,those,though,three,through,throughout,thru,thus,to,together,too,took,toward,towards,
    tried,tries,truly,try,trying,twice,two,un,under,unfortunately,unless,unlikely,until,unto,up,upon,us,use,used,useful,uses,using,usually,
    \'verse\',value,various,very,via,viz,vs,want,wants,was,wasn't,way,we,we'd,we'll,we're,we've,welcome,well,went,were,weren't,what,what's,
    whatever,when,whence,whenever,where,where's,whereafter,whereas,whereby,wherein,whereupon,wherever,whether,which,while,whither,who,who's,
    whoever,whole,whom,whose,why,will,willing,wish,with,within,without,won't,wonder,would,would've,wouldn't,yes,yet,you,you'd,you'll,you're,
    you've,your,yours,yourself,yourselves,zero,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,div,'verse',lyrics-body-text,id,'id';";
    $stopwords = explode(",", $stopwords);
    /* Builds an array of words with all stop words filtered out. (case-insensitive) */
    function filter_stopwords($words, $stopwords) {
        foreach ($words as $pos => $word) {
            if (!in_array(strtolower($word), $stopwords, TRUE)) {
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

    function getLyricsForArtist($artist) {
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

    function getWordCloud($artist_name){
        $text = getLyricsForArtist($artist_name);
        $words = str_word_count($text, 1); /* Generate list of words */
        $word_count = count($words); /* Word count */
        $unique_words = count( array_unique($words) ); /* Unique word count */
        $words_filtered = filter_stopwords($words, $stopwords); /* Filter out stop words from the word list */
        $word_frequency = word_freq($words_filtered); /* Build a word frequency list */
        $word_c = word_cloud($word_frequency, $artist_name); /* Generate a word cloud and get number of tags */
        $word_cloud = $word_c[0]; /* The word cloud */
        $tags = $word_c[1]; /* The number of tags in the word cloud*/

        return $word_cloud;
    }


	// function get_string_between($string, $start, $end){
	// 	$string = " ".$string;
	// 	$ini = strpos($string,$start);
	// 	if ($ini == 0) return "";
	// 	$ini += strlen($start);
	// 	$len = strpos($string,$end,$ini) - $ini;
	// 	return substr($string,$ini,$len);
	// }
	
 //    function getLyricsByArtist($artist, $site, $upperSongLimit)
 //    {
 //        include_once('simple_html_dom.php');
 //        // Create DOM from URL or file
 //        $artist = str_replace(" ", "-", $artist);
 //        $artist = strtolower($artist);
		
	// 	try {
	// 		$html = file_get_html($site . $artist . '-lyrics.html');
	// 	} catch (Exception $e) {
	// 		return "<div>Invalid Artist</div>";
	// 	}
        
 //        $song_links = array();
 //        $str = "";
 //        $massivesonglyrics = "";

 //        foreach ($html->find('a') as $element) {
 //            if (strpos($element, '-lyrics-' . $artist) !== false) {
 //                $song_links[] = $element->href;
 //            }
 //        }
		
	// 	$song_size = count($song_links);
	// 	if ($song_size > $upperSongLimit) {
 //            $song_size = $upperSongLimit;
 //        } 
		
 //        for ($x = 0; $x < $song_size; $x++) {
 //            $htmlsong = file_get_html($song_links[$x]);
 //            foreach ($htmlsong->find('div[id=lyrics-body-text]') as $lyrics) {
 //                $str = preg_replace("/\[([^\[\]]++|(?R))*+\]/", "", $lyrics);
 //                $massivesonglyrics = $massivesonglyrics . $str;
 //            }
 //        }
 //        return $massivesonglyrics;
	// }
	
    function getSongsByWord($_word, $_artist, $_site, $upperSongLimit)
    {
        include_once('simple_html_dom.php');
        // Create DOM from URL or file
        $artist = $_artist;
        $word = $_word;
        $artist = str_replace(" ", "-", $artist);
        $artist = strtolower($artist);
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

    function getSongByTrackID($_track_id){
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