<?php
use Migrations\AbstractSeed;

/**
 * Telefonos seed.
 */
class ANWishListSeed extends AbstractSeed
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
                'identificacionPersona' => $faker->randomElement($array = $rows)[0],
                //'id' => $i
            ];
        }
        $table = $this->table('wish_lists');
        $table->insert($data)->save();
    }
}
