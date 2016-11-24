@javascript
Feature: Search
  In order to see the shop
  As a website user
  I need to be able to see a the index page

  Scenario: Searching for a page that does exist
    Given I am on "/"
    And I follow "Iniciar sesión"
    Then I should see "Acceder a la cuenta"
    When I fill in "Nombre de usuario o correo" with "admin"
    When I fill in "Contraseña" with "spooks"
    And I press "Acceder"
    
    Then I should see "Inicio"


  