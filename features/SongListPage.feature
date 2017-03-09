Feature: Song List Page
  In order to see the list of songs by a particular artist containing a specific word
  As a user
  I need to be able to access a song list page

  Rules:
  - The browser is open to the address of the application

  Scenario: Accessing the Artist Search Page
    Given the user has generated a word cloud
    And the word cloud generated is for "Rihanna"
    When the user clicks on a word, "work", in the word cloud
    Then I should be taken to the song list page
    And there is a Song List
    And there is a back button
    And the song list html title matches the word that was clicked, "work"
    And everything on the page is the right color