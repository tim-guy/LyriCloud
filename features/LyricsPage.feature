Feature: Lyrics Page
  In order to see the lyrics a particular song
  As a user
  I need to be able to access a lyrics page

  Rules:
  - The browser is open to the address of the application

  Scenario: Accessing the Artist Search Page
    Given the user has generated a word cloud
    And the word cloud generated is for "Rihanna"
    And the user has clicked on the word "work" in the word cloud
    When the user clicks on a song, "work", in the word cloud
    Then I should be taken to the lyrics page
    And there is a Lyrics
    And there is are two back button
    And the lyrics html title matches the song that was clicked, "work"
    And everything on the page is the right color