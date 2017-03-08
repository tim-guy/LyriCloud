Feature: Lyrics Title
In order know the name of the song and artist of a song selected on the Lyrics Page
As a user
I need to be able see the title and the artist of the selected song

Rules:
- The Musixmatch API is functioning
- Wifi is working and at maximum level
- Google Chrome is being used as the browser
- The user has opened a browser and the LyriCloud application

Scenario: A song is selected and the title and artist name are displayed
	Given a list of Rihanna songs with the word "rain" is displayed
	When I select the song "Umbrella"
	Then the Lyric Page's label will be "Umbrella" and Rihanna
	And will be in the format of "Umbrella by Rihanna"