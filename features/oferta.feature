@javascript
Feature: Search
  In order to see offers
  As a website user
  I need to be able to go to the offers page

  Scenario: Searching for a page that does exist
    Given I am on "/"
    And I follow "Iniciar sesión"
    Then I should see "Acceder a la cuenta"
    When I fill in "Nombre de usuario o correo" with "admin"
    When I fill in "Contraseña" with "spooks"
    And I press "Acceder"
    
    And I follow "Ofertas"
    Then I should see "Ofertas especiales"