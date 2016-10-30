<?php
use Migrations\AbstractSeed;

/**
 * Telefonos seed.
 */
class AMTarjetasSeed extends AbstractSeed
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
        $faker = Faker\Factory::create();
        $data = [];
        $rows = $this->fetchAll('SELECT identificacion FROM personas');
        for ($i = 0; $i < 100; $i++)
        {
            $data[] = [
                'idPersona' => $faker->randomElement($array = $rows)[0],
                'idTarjeta' => strVal ( 1000000000000000 + rand ( 0, 100 ) ),
                'csv'       => $i
            ];
        }
        $table = $this->table('tarjetas');
        $table->insert($data)->save();
    }
}
