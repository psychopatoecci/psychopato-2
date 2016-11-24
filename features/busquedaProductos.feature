@javascript
Feature: Search
  In order to see the shop
  As a website user
  I need to be search for products that exist

  Scenario: Searching for a product that does exist
    Given I am on "/"
    And I follow "Iniciar sesión"
    Then I should see "Acceder a la cuenta"
    When I fill in "Nombre de usuario o correo" with "admin"
    When I fill in "Contraseña" with "spooks"
    And I press "Acceder"


    When I fill in "Búsqueda" with "ds"
    Then I should see "Añadir al carrito"

  