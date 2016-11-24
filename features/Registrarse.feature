@javascript
Feature: Register User account
  In order touse the shop
  As a User
  I need to be able to make an account 

  Scenario: Going to login administration page
    Given I am on "/"
    And I follow "Iniciar sesión"
    Then I should see "¿Aún no eres miembro?"
    And I press "¡Registrarse!"

    When I fill in "Nombre de usuario" with "spookyharambe"
    When I fill in "correo" with "harambe@dankmemes.com"
    When I fill in "Contraseña" with "spooks"
    And I press "Registrarse"
    Then I should see "Acceder a la cuenta"

    





