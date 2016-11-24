@javascript
Feature: Administrator
  In order to add or modify users
  As the administrator
  I need to be able to go to the users administration page

  Scenario: Going to users administration page
    Given I am on "/"
    And I follow "Iniciar sesión"
    Then I should see "Acceder a la cuenta"
    When I fill in "Nombre de usuario o correo" with "admin"
    When I fill in "Contraseña" with "spooks"
    And I press "Acceder"
    
    And I follow "Administración de usuarios"
    Then I should see "Añadir usuario"