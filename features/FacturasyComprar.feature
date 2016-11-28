@javascript
Feature: Buy a product and see bills
  In order buy a product and see the bills
  As a User
  I need to be able to login and get redirected to the main page, add a product to my cart, buy it and be able to see the bill.

  Scenario: Going to login administration page
    Given I am on "/"
    And I follow "Iniciar sesión"
    Then I should see "Acceder a la cuenta"
    When I fill in "Nombre de usuario o correo" with "oveja"
    When I fill in "Contraseña" with "spooks"
    And I press "Acceder"
    Then I should see "Cerrar sesión"

    And I press "Añadir al carrito"
    And I follow "Realizar la compra de todos estos productos"
    Then I should see "Confirmación de la compra"
    And I press "Completar compra"
    Then I should see "Orden realizada con éxito"

    And I follow "Ver la factura de esta orden"
    Then I should see "Factura de la orden"