@javascript
Feature: Search
  In order to see physical videogames
  As a website user
  I need to be able to go to see the physical videogames

  Scenario: Displaying physical videogames
    Given I am on "/"
    And I follow "Productos"
    And I follow "Juegos físicos"
    Then I should see "Juegos físicos"