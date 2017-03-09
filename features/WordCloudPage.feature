Feature: Word Cloud Page
  In order to generate a word cloud
  As a user
  I need to be able to access an word cloud page

  Rules:
  - The browser is open to the address of the application

  Scenario: Accessing the Artist Search Page
    Given the user is already at the artist search page
    When the user enters a valid name, "Rihanna", in the word cloud
    And the user clicks the search button
    Then I should be taken to the word cloud page where there is a word cloud, text box and 3 buttons
    And the word cloud html title matches the title of the word cloud
    And everything on the page is the right color