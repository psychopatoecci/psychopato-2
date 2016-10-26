<?php
use Migrations\AbstractSeed;

/**
 * Telefonos seed.
 */
class AJComponentesSeed extends AbstractSeed
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
        $data = [];
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 50; $i++)
        {
            $data = [
                'idComponente' => $faker->unique()->numberBetween($min = 101, $max = 999),
                'descripcion'  => $faker->sentence($nbWords = 5, $variableNbWords = true),
                'nombreComponente' => $faker->word ()
            ];
        
            $table = $this->table('componentes');
            $table->insert($data)->save();
        }
    }
}
