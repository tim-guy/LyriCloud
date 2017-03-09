Feature: Lyrics
In order view the lyrics of a song
As a user
I need to be able to click a song from the song list page

Rules:
- The Musixmatch API is functioning
- Wifi is working and at maximum level
- Google Chrome is being used as the browser
- The user has opened a browser and the LyriCloud application

Scenario: Lyrics of song selected displated
	Given a list of Rihanna songs with the word "rain" is displayed
	When I select the song "Umbrella"
	Then the lyrics to the song "Umbrella" will be displayed 
	And all occurances of the word "rain" will be highlighted in yellow
	