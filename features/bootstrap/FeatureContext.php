<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
	   $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');
	   $session = new \Behat\Mink\Session($driver);
	   $session->start();

       //$session->visit('http://www.youtube.com');
    }

    /**
     * @Given a word cloud of all Rihanna lyrics is displayed
     */
    public function aWordCloudOfAllRihannaLyricsIsDisplayed()
    {
        return true;
    }

    /**
     * @Given the add button is clickable
     */
    public function theAddButtonIsClickable()
    {
        return true;
    }

    /**
     * @Given I have typed Madonna into the search bar
     */
    public function iHaveTypedMadonnaIntoTheSearchBar()
    {
        return true;

        
    }

    /**
     * @When I click Add
     */
    public function iClickAdd()
    {
        return true;
        
    }

    /**
     * @Then the Word Cloud Title will be updated to :arg1
     */
    public function theWordCloudTitleWillBeUpdatedTo($arg1)
    {
        return true;
        
    }

    /**
     * @Then Madonna's lyrics will be added to the word cloud
     */
    public function madonnaSLyricsWillBeAddedToTheWordCloud()
    {
        return true;
        
    }

    /**
     * @Given I am on the Artist Search page
     */
    public function iAmOnTheArtistSearchPage()
    {
        return true;
        
    }

    /**
     * @When I type nothing in the Artist Search Bar
     */
    public function iTypeNothingInTheArtistSearchBar()
    {
        return true;
        
    }

    /**
     * @Then the Artist Search Bar has a state of NO-SELECTION
     */
    public function theArtistSearchBarHasAStateOfNoSelection()
    {
        return true;
        
    }

    /**
     * @Then the textbox is always editable
     */
    public function theTextboxIsAlwaysEditable()
    {
        return true;
        
    }

    /**
     * @When I start typing
     */
    public function iStartTyping()
    {
        return true;
        
    }

    /**
     * @When I type :arg1 in the text box
     */
    public function iTypeInTheTextBox($arg1)
    {
        return true;
        
    }

    /**
     * @Then the suggestions drop-down should contain at least :arg2 artists whose names are approximate matches for :arg1
     */
    public function theSuggestionsDropDownShouldContainAtLeastArtistsWhoseNamesAreApproximateMatchesFor($arg1, $arg2)
    {
        return true;
        
    }

    /**
     * @Then for each artist in the suggestions drop-down, a name and image should be displayed
     */
    public function forEachArtistInTheSuggestionsDropDownANameAndImageShouldBeDisplayed()
    {
        return true;
        
    }

    /**
     * @Given I have typed :arg1
     */
    public function iHaveTyped($arg1)
    {
        return true;
        
    }

    /**
     * @Given :arg1 has come up in the suggestion drop down
     */
    public function hasComeUpInTheSuggestionDropDown($arg1)
    {
        return true;
        
    }

    /**
     * @When I click on :arg1 from the suggestion drop down
     */
    public function iClickOnFromTheSuggestionDropDown($arg1)
    {
        return true;
        
    }

    /**
     * @Then the Artist Search Bar shoule be updated to :arg1
     */
    public function theArtistSearchBarShouleBeUpdatedTo($arg1)
    {
        return true;
        
    }

    /**
     * @Then the Artist Search Bar should adopt a state of YES-SELECTION
     */
    public function theArtistSearchBarShouldAdoptAStateOfYesSelection()
    {
        return true;
        
    }

    /**
     * @When I go to the address of the application
     */
    public function iGoToTheAddressOfTheApplication()
    {
        return true;
        
    }

    /**
     * @Then I should find a text box
     */
    public function iShouldFindATextBox()
    {
        return true;
        
    }

    /**
     * @Then I should find a search bar
     */
    public function iShouldFindASearchBar()
    {
        return true;
        
    }

    /**
     * @Then everything on the page is the right color
     */
    public function everythingOnThePageIsTheRightColor()
    {
        return true;
        
    }

    /**
     * @Given Rihanna is in the artist word bank
     */
    public function rihannaIsInTheArtistWordBank()
    {
        return true;
        
    }

    /**
     * @When I type a :arg1 in the search bar
     */
    public function iTypeAInTheSearchBar($arg1)
    {
        return true;
        
    }

    /**
     * @Then Rihanna will show up in the dropdown suggestions in under :arg1 second
     */
    public function rihannaWillShowUpInTheDropdownSuggestionsInUnderSecond($arg1)
    {
        return true;
        
    }

    /**
     * @Given Rihanna is selected in the dropdown
     */
    public function rihannaIsSelectedInTheDropdown()
    {
        return true;
        
    }

    /**
     * @When I press the Search button
     */
    public function iPressTheSearchButton()
    {
        return true;
        
    }

    /**
     * @Then a word cloud using the Rihanna's lyrics will be generated in under :arg1 second
     */
    public function aWordCloudUsingTheRihannaSLyricsWillBeGeneratedInUnderSecond($arg1)
    {
        return true;
        
    }

    /**
     * @Given Rihanna's word cloud has been generated
     */
    public function rihannaSWordCloudHasBeenGenerated()
    {
        return true;
        
    }

    /**
     * @When I click on the lyric :arg1 on the page
     */
    public function iClickOnTheLyricOnThePage($arg1)
    {
        return true;
        
    }

    /**
     * @Then a song list will be generated in under :arg2 second of songs that contain the lyric :arg1
     */
    public function aSongListWillBeGeneratedInUnderSecondOfSongsThatContainTheLyric($arg1, $arg2)
    {
        return true;
        
    }

    /**
     * @Given a song list of Rihanna songs that contain :arg1  has been generated
     */
    public function aSongListOfRihannaSongsThatContainHasBeenGenerated($arg1)
    {
        return true;
        
    }

    /**
     * @When I click the song, :arg1 from the song list
     */
    public function iClickTheSongFromTheSongList($arg1)
    {
        return true;
        
    }

    /**
     * @Then a page with the lyrics from the song, :arg1 will be displayed in under :arg2 second
     */
    public function aPageWithTheLyricsFromTheSongWillBeDisplayedInUnderSecond($arg1, $arg2)
    {
        return true;
        
    }

    /**
     * @Given a Rihanna word cloud has already been generated
     */
    public function aRihannaWordCloudHasAlreadyBeenGenerated()
    {
        return true;
        
    }

    /**
     * @When I click to add Madonna as an additional artist
     */
    public function iClickToAddMadonnaAsAnAdditionalArtist()
    {
        return true;
        
    }

    /**
     * @Then a new word cloud with Rihanna and Madonna lyrics will be generated in under :arg1 second
     */
    public function aNewWordCloudWithRihannaAndMadonnaLyricsWillBeGeneratedInUnderSecond($arg1)
    {
        return true;
        
    }

    /**
     * @Given a list of Rihanna songs with the word :arg1 is displayed
     */
    public function aListOfRihannaSongsWithTheWordIsDisplayed($arg1)
    {
        return true;
        
    }

    /**
     * @When I select the song :arg1
     */
    public function iSelectTheSong($arg1)
    {
        return true;
        
    }

    /**
     * @Then the lyrics to the song :arg1 will be displayed
     */
    public function theLyricsToTheSongWillBeDisplayed($arg1)
    {
        return true;
        
    }

    /**
     * @Then all occurances of the word :arg1 will be highlighted in yellow
     */
    public function allOccurancesOfTheWordWillBeHighlightedInYellow($arg1)
    {
        return true;
        
    }

    /**
     * @Given the user has generated a word cloud
     */
    public function theUserHasGeneratedAWordCloud()
    {
        return true;
        
    }

    /**
     * @Given the word cloud generated is for :arg1
     */
    public function theWordCloudGeneratedIsFor($arg1)
    {
        return true;
        
    }

    /**
     * @Given the user has clicked on the word :arg1 in the word cloud
     */
    public function theUserHasClickedOnTheWordInTheWordCloud($arg1)
    {
        return true;
        
    }

    /**
     * @When the user clicks on a song, :arg1, in the word cloud
     */
    public function theUserClicksOnASongInTheWordCloud($arg1)
    {
        return true;
        
    }

    /**
     * @Then I should be taken to the lyrics page
     */
    public function iShouldBeTakenToTheLyricsPage()
    {
        return true;
        
    }

    /**
     * @Then there is a Lyrics
     */
    public function thereIsALyrics()
    {
        return true;
        
    }

    /**
     * @Then there is are two back button
     */
    public function thereIsAreTwoBackButton()
    {
        return true;
        
    }

    /**
     * @Then the lyrics html title matches the song that was clicked, :arg1
     */
    public function theLyricsHtmlTitleMatchesTheSongThatWasClicked($arg1)
    {
        return true;
        
    }

    /**
     * @Then the Lyric Page's label will be :arg1 and Rihanna
     */
    public function theLyricPageSLabelWillBeAndRihanna($arg1)
    {
        return true;
        
    }

    /**
     * @Then will be in the format of :arg1
     */
    public function willBeInTheFormatOf($arg1)
    {
        return true;
        
    }

    /**
     * @When I click Search
     */
    public function iClickSearch()
    {
        return true;
        
    }

    /**
     * @Then nothing will happen
     */
    public function nothingWillHappen()
    {
        return true;
        
    }

    /**
     * @Given the Artist Search bar has a state of YES-SELECTION
     */
    public function theArtistSearchBarHasAStateOfYesSelection()
    {
        return true;
        
    }

    /**
     * @Given :arg1 has been selected in the drop down
     */
    public function hasBeenSelectedInTheDropDown($arg1)
    {
        return true;
        
    }

    /**
     * @Then I will be navigated to a Word cloud page for Rihanna
     */
    public function iWillBeNavigatedToAWordCloudPageForRihanna()
    {
        return true;
        
    }

    /**
     * @Then the Word Cloud Title will be :arg1
     */
    public function theWordCloudTitleWillBe($arg1)
    {
        return true;
        
    }

    /**
     * @When I click the :arg1 button
     */
    public function iClickTheButton($arg1)
    {
        return true;
        
    }

    /**
     * @Then I will be redirected to the Facebook website with the action of creating a new post
     */
    public function iWillBeRedirectedToTheFacebookWebsiteWithTheActionOfCreatingANewPost()
    {
        return true;
        
    }

    /**
     * @Then the post will consist of an image of the word cloud and the name of the artist of the word cloud
     */
    public function thePostWillConsistOfAnImageOfTheWordCloudAndTheNameOfTheArtistOfTheWordCloud()
    {
        return true;
        
    }

    /**
     * @Then any logging-in, etc. is handled by Facebook
     */
    public function anyLoggingInEtcIsHandledByFacebook()
    {
        return true;
        
    }

    /**
     * @When I select the word, :arg1
     */
    public function iSelectTheWord($arg1)
    {
        return true;
        
    }

    /**
     * @Then a list containing all songs by Rihanna whose lyrics contain :arg1 will be displayed
     */
    public function aListContainingAllSongsByRihannaWhoseLyricsContainWillBeDisplayed($arg1)
    {
        return true;
        
    }

    /**
     * @Then all songs are sorted according to number of occurances of the word in that songs lyrics, descending
     */
    public function allSongsAreSortedAccordingToNumberOfOccurancesOfTheWordInThatSongsLyricsDescending()
    {
        return true;
        
    }

    /**
     * @Then each entry in the list consists of the title of the corresponding song, followed in parentheses by the number of occurrences of the word in that song
     */
    public function eachEntryInTheListConsistsOfTheTitleOfTheCorrespondingSongFollowedInParenthesesByTheNumberOfOccurrencesOfTheWordInThatSong()
    {
        return true;
        
    }

    /**
     * @Given a song list is displayed of all songs by Rihanna that contain the word :arg1
     */
    public function aSongListIsDisplayedOfAllSongsByRihannaThatContainTheWord($arg1)
    {
        return true;
        
    }

    /**
     * @When I click on the title of song in the list, :arg1
     */
    public function iClickOnTheTitleOfSongInTheList($arg1)
    {
        return true;
        
    }

    /**
     * @Then I am navigated to a Lyrics Page for the song :arg1 by Rihanna
     */
    public function iAmNavigatedToALyricsPageForTheSongByRihanna($arg1)
    {
        return true;
        
    }

    /**
     * @When the user clicks on a word, :arg1, in the word cloud
     */
    public function theUserClicksOnAWordInTheWordCloud($arg1)
    {
        return true;
        
    }

    /**
     * @Then I should be taken to the song list page
     */
    public function iShouldBeTakenToTheSongListPage()
    {
        return true;
        
    }

    /**
     * @Then there is a Song List
     */
    public function thereIsASongList()
    {
        return true;
        
    }

    /**
     * @Then there is a back button
     */
    public function thereIsABackButton()
    {
        return true;
        
    }

    /**
     * @Then the song list html title matches the word that was clicked, :arg1
     */
    public function theSongListHtmlTitleMatchesTheWordThatWasClicked($arg1)
    {
        return true;
        
    }

    /**
     * @Then the Song List Page's label will be :arg1
     */
    public function theSongListPageSLabelWillBe($arg1)
    {
        return true;
        
    }

    /**
     * @Given I am on :arg1
     */
    public function iAmOn($arg1)
    {
        return true;
        
    }

    /**
     * @Given Rihanna is selected in the drop down menu of the search bar
     */
    public function rihannaIsSelectedInTheDropDownMenuOfTheSearchBar()
    {
        return true;
        
    }

    /**
     * @Given Rihanna has over :arg1 frequently occurring words
     */
    public function rihannaHasOverFrequentlyOccurringWords($arg1)
    {
        return true;
        
    }

    /**
     * @Then a word cloud containing the :arg1 most frequently occurring words from the lyrics of Rihanna will be created
     */
    public function aWordCloudContainingTheMostFrequentlyOccurringWordsFromTheLyricsOfRihannaWillBeCreated($arg1)
    {
        return true;
        
    }

    /**
     * @Then the word cloud will omit commonly used words
     */
    public function theWordCloudWillOmitCommonlyUsedWords()
    {
        return true;
        
    }

    /**
     * @Then the words in the word cloud will be horizontal
     */
    public function theWordsInTheWordCloudWillBeHorizontal()
    {
        return true;
        
    }

    /**
     * @Then the word cloud will be rectangular
     */
    public function theWordCloudWillBeRectangular()
    {
        return true;
        
    }

    /**
     * @Then the word cloud will be colorful
     */
    public function theWordCloudWillBeColorful()
    {
        return true;
        
    }

    /**
     * @Then the size of the words in the cloud should be proportional to the frequency of the word in the lyrics
     */
    public function theSizeOfTheWordsInTheCloudShouldBeProportionalToTheFrequencyOfTheWordInTheLyrics()
    {
        return true;
        
    }

    /**
     * @Given Rihanna has less than :arg1 frequently occurring words
     */
    public function rihannaHasLessThanFrequentlyOccurringWords($arg1)
    {
        return true;
        
    }

    /**
     * @Then a word cloud containing the most frequently occurring words from the lyrics of Rihanna will be created
     */
    public function aWordCloudContainingTheMostFrequentlyOccurringWordsFromTheLyricsOfRihannaWillBeCreated2()
    {
        return true;
        
    }

    /**
     * @Given a word cloud is displayed of the most frequently used words by Rihanna
     */
    public function aWordCloudIsDisplayedOfTheMostFrequentlyUsedWordsByRihanna()
    {
        return true;
        
    }

    /**
     * @When I click on the word :arg1 in the word cloud
     */
    public function iClickOnTheWordInTheWordCloud($arg1)
    {
        return true;
        
    }

    /**
     * @Then I am navigated to a Song List Page for all songs by Rihanna that contain the word :arg1
     */
    public function iAmNavigatedToASongListPageForAllSongsByRihannaThatContainTheWord($arg1)
    {
        return true;
        
    }

    /**
     * @Then the Song List Title will be :arg1
     */
    public function theSongListTitleWillBe($arg1)
    {
        return true;
        
    }

    /**
     * @Given the user is already at the artist search page
     */
    public function theUserIsAlreadyAtTheArtistSearchPage()
    {
        return true;
        
    }

    /**
     * @When the user enters a valid name, :arg1, in the word cloud
     */
    public function theUserEntersAValidNameInTheWordCloud($arg1)
    {
        return true;
        
    }

    /**
     * @When the user clicks the search button
     */
    public function theUserClicksTheSearchButton()
    {
        return true;
        
    }

    /**
     * @Then I should be taken to the word cloud page where there is a word cloud, text box and :arg1 buttons
     */
    public function iShouldBeTakenToTheWordCloudPageWhereThereIsAWordCloudTextBoxAndButtons($arg1)
    {
        return true;
        
    }

    /**
     * @Then the word cloud html title matches the title of the word cloud
     */
    public function theWordCloudHtmlTitleMatchesTheTitleOfTheWordCloud()
    {
        return true;
        
    }

    /**
     * @Then the Word Cloud Page's label will be :arg1
     */
    public function theWordCloudPageSLabelWillBe($arg1)
    {
        return true;
        
    }
}
