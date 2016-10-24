@javascript
Feature: Search
  In order to see the shop
  As a website user
  I need to be able to see a the index page

  Scenario: Searching for a page that does exist
    Given I am on "/"
    Then I should see "Inicio"


  