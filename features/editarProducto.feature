@javascript
Feature: User login EDIT PRODUCT and logout
  In order to edit a product
  As a administrator
  I need to be able to login and get redirected to the main page, then go to Administracion de productos, edit a product and then logout

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


    When I fill in "Nombre" with "NombreCambiado"
    And I press "Guardar cambios"
    Then I should see "Cambios realizados con éxito"

    And I follow "Cerrar sesión"
    Then I should see "Iniciar sesión"




