<?php
use Migrations\AbstractSeed;

/**
 * AUCombos seed.
 */
class AUCombosSeed extends AbstractSeed
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
        $contador=0;
        for ($i = 0; $i < 50; $i++)
        {
            $data[] = [
                'idCombo' => $i,
                'precioCombo' => $faker->numberBetween($min = 1000, $max = 999999)
            ];
        }
        $table = $this->table('combos');
        $table->insert($data)->save();
    }
}
