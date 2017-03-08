Feature: Artist Search Bar
In order to search for an artist
As a user
I need be able to enter the artist name in a text box

Rules:
- The Musixmatch API is functioning
- Wifi is working and at maximum level
- Google Chrome is being used as the browser
- The user has opened a browser and the LyriCloud application

Scenario: Textbox is empty
	Given I am on the Artist Search page
	When I type nothing in the Artist Search Bar
	Then the Artist Search Bar has a state of NO-SELECTION
	And the textbox is always editable

Scenario: Typing in textbox
	Given I am on the Artist Search page
	When I start typing
	Then the Artist Search Bar has a state of NO-SELECTION

Scenario: 3 or more letters typed for suggestions
	Given I am on the Artist Search page
	When I type "rih" in the text box
	Then the suggestions drop-down should contain at least 3 artists whose names are approximate matches for "rih"
	And for each artist in the suggestions drop-down, a name and image should be displayed

Scenario: Less than 3 letters typed for suggestions
	Given I am on the Artist Search page
	When I type "ri" in the text box
	Then the Artist Search Bar has a state of NO-SELECTION

Scenario: Selecting an artist
	Given I have typed "rih"
	And "Rihanna" has come up in the suggestion drop down
	When I click on "Rihanna" from the suggestion drop down
	Then the Artist Search Bar shoule be updated to "Rihanna" 
	And the Artist Search Bar should adopt a state of YES-SELECTION