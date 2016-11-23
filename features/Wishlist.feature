@javascript
Feature: ADD to WISHLIST and DELETE
  In order add a product to the wishlist
  As a User
  I need to be able to login and get redirected to the main page, click on Products/ Juegos Fisicos Categoria RPG, add a product to my wishlist and delete that product from the wishlist afterwards

  Scenario: Going to login administration page
    Given I am on "/"
    And I follow "Iniciar sesión"
    Then I should see "Acceder a la cuenta"
    When I fill in "Nombre de usuario o correo" with "admin"
    When I fill in "Contraseña" with "spooks"
    And I press "Acceder"
    Then I should see "Cerrar sesión"

    Given I am on "detalles/PROD102728"
    And I press "Agregar a wishlist"
    Then I should see "Producto añadido a la wishlist."

    And I press "Borrar"
    Then I should see "Producto borrado de la wishlist."





