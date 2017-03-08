<?php

use PHPUnit\Framework\TestCase;

/**
 * Test WordCloud.php
 */

final class WordCloudTest extends TestCase
{
	//tests if words are correctly filtered out
	public function test_filter_words(){
		//(Arrange) All words should be filtered out except "Hello" and "World"
		$words = "he, she, they, them, they, and, the, me, thislyricsisnotforcommercialuse, hello, world";
        $words = explode(",", $words);
        $hello = " hello, world";
        $hello = explode(",", $hello);

        //Act
        $cloud = new WordCloud();
        $words = $cloud->filter_words($words);

        //Assert
        sort($words);
        sort($hello);
        //check that the two arrays equal each other
        $this->assertEquals($words, $hello);
	}

	//tests if word frequency is counted correctly
	public function test_word_freq(){
		//Arrange
		$words = "lol,lol,lol,lmao,HA,ha,ha,ha,jk,jk";
        $words = explode(",", $words);

        //Act
        $cloud = new WordCloud();
        $frequency_list = $cloud->word_freq($words);

        //Assert
        //make sure each word is counted correctly
        $this->assertEquals($frequency_list["lol"], 3);
        $this->assertEquals($frequency_list["lmao"], 1);
        $this->assertEquals($frequency_list["ha"], 4);
        $this->assertEquals($frequency_list["jk"], 2);
	}

	//Word Cloud is an API so we just need to test if the API call worked or not, not the substance of the API
	public function test_word_cloud(){
		//Arrange


        //Act
		$cloud = new WordCloud();
		$name = "Rihanna";
        $text = $cloud->getLyricsForArtistt($name);
        $words = str_word_count($text, 1);
        $word_frequency = $cloud->word_freq($words);
		$word_c = $cloud->word_cloud($word_frequency, $name);
		$tags = $word_c[1];

		//Assert
		//tests if the right number of tags come up 
		//$this->assertEquals($tags, 14);
		//tests if the call worked
		$this->assertLessThan($tags, 0);

	}

	//this test should check if the API call was successful or not (the job of a remote API client), not what is in those calls
	public function test_getLyricsForArtistt(){
		//Arrange
		$cloud = new WordCloud();
		$lyrics_content = $cloud->getLyricsForArtistt("Rihanna");
		$lyrics_no_content = $cloud->getLyricsForArtistt("asdfadsfadfgag");

		//Assert
		//make sure lyrics ARE returned for an artist that exists
		$this->assertLessThan(sizeof($lyrics_content), 0);
		//make sure NO lyrics returned for an artist that does not exist
		$this->assertEquals($lyrics_no_content, '');

	}

	public function test_WordCloudGenerator(){

	}

	public function test_WordCloudGenerator(){
		
	}

	public function test_WordCloudGenerator(){
		
	}

}