@javascript
Feature: Administrator
  In order to add or modify products
  As the administrator
  I need to be able to go to the products administration page

  Scenario: Going to product administration page
    Given I am on "/"
    And I follow "Administración de productos"
    Then I should see "Añadir producto"