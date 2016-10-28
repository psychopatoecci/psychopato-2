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
        $faker  = Faker\Factory::create();
        $data   = [];
        $hasher = new DefaultPasswordHasher();
        $pw     = $hasher -> hash ('spooks');
        for ($i = 0; $i < 200; $i++)
        {
            $data[] = [
                'identificacion' => $faker->firstName($gender = null|'male'|'female').$i,
                'nombre'         => $faker->firstName($gender = null|'male'|'female'),
                'apellido1'      => $faker->lastName,
                'apellido2'      => $faker->lastName,
                'correo'         => $faker->email,
                'administrador'  => rand (0, 1),
                'contraseña'     => $pw,
                'fecha_nacimiento'  => $faker->date($format = 'Y-m-d', $max = '2010-01-01'),
            ];
        }

        $table = $this->table('personas');
        $table->insert($data)->save();
    }
}
