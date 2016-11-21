<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;
/**
 * Personas seed.
 */
class AAPersonasSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $faker         = Faker\Factory::create();
        $datosPersonas = [];
        $datosUsuarios = [];
        $hasher        = new DefaultPasswordHasher();
        $pw            = $hasher -> hash ('spooks');
        // Se agrega el admin principal.
        $datosPersonas [] = [
                'identificacion' => 'admin',
                'nombre'         => $faker->firstName($gender = null|'male'|'female'),
                'apellido1'      => $faker->lastName,
                'apellido2'      => $faker->lastName,
                'correo'         => $faker->email,
                'administrador'  => 1,
                'contraseña'     => $pw,
                'fecha_nacimiento'  => $faker->date($format = 'Y-m-d', $max = '2010-01-01'),
        ];
        $datosPersonas [] = [
                'identificacion' => 'oveja',
                'nombre'         => $faker->firstName($gender = null|'male'|'female'),
                'apellido1'      => $faker->lastName,
                'apellido2'      => $faker->lastName,
                'correo'         => $faker->email,
                'administrador'  => 0,
                'contraseña'     => $pw,
                'fecha_nacimiento'  => $faker->date($format = 'Y-m-d', $max = '2010-01-01'),
        ];
        $datosUsuarios[] = [
                'username' => 'admin',
                'password' => $pw,
                'role'     => 'admin'
        ];
        $datosUsuarios[] = [
                'username' => 'oveja',
                'password' => $pw,
                'role'     => 'user'
        ];
      
        for ($i = 0; $i < 200; $i++)
        {
            $nomUsuario = $faker->firstName($gender = null|'male'|'female').$i;
            $datosPersonas[] = [
                'identificacion' => $nomUsuario,
                'nombre'         => $faker->firstName($gender = null|'male'|'female'),
                'apellido1'      => $faker->lastName,
                'apellido2'      => $faker->lastName,
                'correo'         => $faker->email,
                'administrador'  => rand (0, 1),
                'contraseña'     => $pw,
                'fecha_nacimiento'  => $faker->date($format = 'Y-m-d', $max = '2010-01-01'),
            ];
            $datosUsuarios[] = [
                'username' => $nomUsuario,
                'password' => $pw,
                'role'     => 'author'
            ];
        }

        $table = $this->table('personas');
        $table->insert($datosPersonas)->save();
        $table = $this->table('users');
        $table->insert($datosUsuarios)->save();
    }
}
