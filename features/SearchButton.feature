Feature: Search Button
In order to generate a word cloud
As a user
I need be able to click a search button

Rules:
- The Musixmatch API is functioning
- Wifi is working and at maximum level
- Google Chrome is being used as the browser
- The user has opened a browser and the LyriCloud application

Scenario: Button is not clickable
	Given the Artist Search Bar has a state of NO-SELECTION
	When I click Search
	Then nothing will happen 

Scenario: Button is clickable
	Given the Artist Search bar has a state of YES-SELECTION
	And "Rihanna" has been selected in the drop down
	When I click Search
	Then I will be navigated to a Word cloud page for Rihanna
	And the Word Cloud Title will be "Rihanna"