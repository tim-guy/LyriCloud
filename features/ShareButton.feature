Feature: Share Button
In order share the word cloud I made with the world
As a user
I need be able to share the JPEG of the word cloud on Facebook

Rules:
- The Musixmatch API is functioning
- Wifi is working and at maximum level
- Google Chrome is being used as the browser
- The user has opened a browser and the LyriCloud application

Scenario: Sharing a word cloud on Facebook
	Given a word cloud of all Rihanna lyrics is displayed
	When I click the "Share" button
	Then I will be redirected to the Facebook website with the action of creating a new post
	And the post will consist of an image of the word cloud and the name of the artist of the word cloud
	And any logging-in, etc. is handled by Facebook