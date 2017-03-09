Feature: Add button
In order learn more about how lyrics relate to artists
I need be able to add multiple artists to a single word cloud

Rules:
- The Musixmatch API is functioning
- Wifi is working and at maximum level
- Google Chrome is being used as the browser
- The user has opened a browser and the LyriCloud application

Scenario: Adding an artist to a pre-existing word cloud
	Given a word cloud of all Rihanna lyrics is displayed
	And the add button is clickable
	And I have typed Madonna into the search bar
	When I click Add
	Then the Word Cloud Title will be updated to "Rihanna and Madonna"
	And Madonna's lyrics will be added to the word cloud