<?php
use Migrations\AbstractSeed;

/**
 * Telefonos seed.
 */
class AOWishListProductosSeed extends AbstractSeed
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
        $data  = [];
        //$pers  = $this->fetchAll('SELECT identificacion FROM personas');
        $prod  = $this->fetchAll('SELECT idProducto FROM productos');
        $wishL = $this
            ->fetchAll('SELECT id, identificacionPersona FROM wish_lists');
        for ($i = 0; $i < count($wishL); $i++)
        {
            $data[] = [
                'identificacionPersona'
                    => $wishL [$i]['identificacionPersona'],
                'idProducto'
                    => $faker->randomElement($array = $prod)[0],
                'idWishList'
                    => $wishL [$i]['id'], // Evita repeticiones
            ];
        }
        $table = $this->table('wish_list_productos');
        $table->insert($data)->save();
    }
}
