@javascript
Feature: User Login delete product and logout
  In order to delete a product
  As a administrator
  I need to be able to login and get redirected to the main page, then go to Administracion de productos, delete a product and then logout

  Scenario: Going to login administration page
    Given I am on "/"
    And I follow "Iniciar sesión"
    Then I should see "Acceder a la cuenta"
    When I fill in "Nombre de usuario o correo" with "admin"
    When I fill in "Contraseña" with "spooks"
    And I press "Acceder"
    Then I should see "Cerrar sesión"

    And I follow "Administración de productos"
    Then I should see "Añadir producto"



    And I follow "BORRAR PRODUCTO"
    And I press "Borrar producto"
    Then I should see "DATOS GENERALES"

    And I follow "Cerrar sesión"
    Then I should see "Iniciar sesión"




