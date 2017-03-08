Feature: Word Cloud Title
In order know the artist selected for the word cloud page
As a user
I need the title of the Song List Page to the be the artist the word cloud is intialized with

Rules:
- The Musixmatch API is functioning
- Wifi is working and at maximum level
- Google Chrome is being used as the browser
- The user has opened a browser and the LyriCloud application

Scenario: Displaying a word cloud by a certain artist 
	Given Rihanna is selected in the drop down menu of the search bar
	When I click Search
	Then the Word Cloud Page's label will be "Rihanna"