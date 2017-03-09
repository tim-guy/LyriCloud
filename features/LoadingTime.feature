Feature: Perfomance requirment
In order to use this application
As a user
I need to have an adaquate response time of 1 second to any user input

Rules:
- Wifi is working and at maximum level
- Google Chrome is being used as the browser
- The user has opened a browser and the LyriCloud application

Scenario: Autocomplete (artist search bar)
	Given Rihanna is in the artist word bank
	When I type a "r" in the search bar
	Then Rihanna will show up in the dropdown suggestions in under 1 second
	
Scenario: Word cloud generation 
	Given Rihanna is selected in the dropdown
	When I press the Search button
	Then a word cloud using the Rihanna's lyrics will be generated in under 1 second

Scenario: Song List generation
	Given Rihanna's word cloud has been generated
	When I click on the lyric "rain" on the page
	Then a song list will be generated in under 1 second of songs that contain the lyric "rain"

Scenario: Lyrics page generation
	Given a song list of Rihanna songs that contain "rain"  has been generated
	When I click the song, "Umbrella" from the song list
	Then a page with the lyrics from the song, "Umbrella" will be displayed in under 1 second

Scenario: Add artist word cloud generation
	Given a Rihanna word cloud has already been generated
	When I click to add Madonna as an additional artist
	Then a new word cloud with Rihanna and Madonna lyrics will be generated in under 1 second
