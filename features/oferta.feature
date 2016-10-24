@javascript
Feature: Search
  In order to see offers
  As a website user
  I need to be able to go to the offers page

  Scenario: Searching for a page that does exist
    Given I am on "/"
    And I follow "Ofertas"
    Then I should see "Ofertas especiales"