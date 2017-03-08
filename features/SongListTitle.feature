Feature: Song Title
In order know the word selected on the Song List Page
As a user
I need the title of the Song List Page to the be the word the page is intialized with

Rules:
- The Musixmatch API is functioning
- Wifi is working and at maximum level
- Google Chrome is being used as the browser
- The user has opened a browser and the LyriCloud application

Scenario: Displaying a song list by a certain artist containing a certain word
	Given a word cloud of all Rihanna lyrics is displayed
	When I select the word, "rain"
	Then the Song List Page's label will be "rain"