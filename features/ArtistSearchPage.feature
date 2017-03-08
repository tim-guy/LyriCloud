Feature: Artist Search Page
  In order to use the application
  As a user
  I need to be able to access an Artist Search Page

  Rules:
  - The browser is open

  Scenario: Accessing the Artist Search Page
    When I go to the address of the application
    Then I should find a text box
    And I should find a search bar
    And everything on the page is the right color