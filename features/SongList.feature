Feature: Song List
In order see the correlation between artist and lyrics
As a user
I need to be view a list of songs by a certain artist which contain a certain word

Rules:
- The Musixmatch API is functioning
- Wifi is working and at maximum level
- Google Chrome is being used as the browser
- The user has opened a browser and the LyriCloud application

Scenario: Displaying a song list by a certain artist containing a certain word
	Given a word cloud of all Rihanna lyrics is displayed
	When I select the word, "rain"
	Then a list containing all songs by Rihanna whose lyrics contain "rain" will be displayed
	And all songs are sorted according to number of occurances of the word in that songs lyrics, descending
	And each entry in the list consists of the title of the corresponding song, followed in parentheses by the number of occurrences of the word in that song

Scenario: Navigating to the lyrics page from the song list page
	Given a song list is displayed of all songs by Rihanna that contain the word "rain"
	When I click on the title of song in the list, "Umbrella"
	Then I am navigated to a Lyrics Page for the song "Umbrella" by Rihanna