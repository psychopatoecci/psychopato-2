@javascript
Feature: Search
  In order to see a word definition
  As a website user
  I need to be able to  see a word

  Scenario: Searching for a page that does exist
    Given I am on "/pruebas/index.html"
    Then I should see "Cuenta"

 