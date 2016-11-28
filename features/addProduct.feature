@javascript
Feature: ADD product
  In order add a pnew product
  As a administrator
  I need to be able to login and get redirected to the main page, click on add products, fill in the spaces and add the product.

  Scenario: Going to login administration page
    Given I am on "/"
    And I follow "Iniciar sesión"
    Then I should see "Acceder a la cuenta"
    When I fill in "Nombre de usuario o correo" with "admin"
    When I fill in "Contraseña" with "spooks"
    And I press "Acceder"
    Then I should see "Cerrar sesión"

    And I follow "Administración de productos"
    And I press "Añadir producto"
    When I fill in "identificador" with "PROD12321"
    When I fill in "precio" with "5000"
    And I press "Agregar producto"
    Then I should see "Insertado correctamente"




