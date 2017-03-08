Feature: Word cloud
In order visually see song lyrics assoicated with an artist
As a user
I need be able to view a word cloud of the most frequently used words an artist uses

Rules:
- The Musixmatch API is functioning
- Wifi is working and at maximum level
- Google Chrome is being used as the browser
- The user has opened a browser and the LyriCloud application

Scenario: Creating a word cloud with more than 250 words
	Given Rihanna is selected in the drop down menu of the search bar
	And Rihanna has over 250 frequently occurring words
	When I click Search
	Then a word cloud containing the 250 most frequently occurring words from the lyrics of Rihanna will be created
	And the word cloud will omit commonly used words
	And the words in the word cloud will be horizontal
	And the word cloud will be rectangular
	And the word cloud will be colorful
	And the size of the words in the cloud should be proportional to the frequency of the word in the lyrics

Scenario: Creating a word cloud with less than 250 words
	Given Rihanna is selected in the drop down menu of the search bar
	And Rihanna has less than 250 frequently occurring words
	When I click Search
	Then a word cloud containing the most frequently occurring words from the lyrics of Rihanna will be created
	And the word cloud will omit commonly used words
	And the words in the word cloud will be horizontal
	And the word cloud will be rectangular
	And the word cloud will be colorful
	And the size of the words in the cloud should be proportional to the frequency of the word in the lyrics

Scenario: Navigating to the song list page from the word cloud page
	Given a word cloud is displayed of the most frequently used words by Rihanna
	When I click on the word "rain" in the word cloud
	Then I am navigated to a Song List Page for all songs by Rihanna that contain the word "rain"
	And the Song List Title will be "rain"