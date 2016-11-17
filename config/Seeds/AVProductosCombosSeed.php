<?php
use Migrations\AbstractSeed;

/**
 * AVProductosCombos seed.
 */
class AVProductosCombosSeed extends AbstractSeed
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
        $rows = $this->fetchAll('SELECT idProducto FROM productos');
        $contador=0;
        foreach($rows as $var){
            $idProd[$contador] = $var[0];
            $contador++;
        }
        $rows2 = $this->fetchAll('SELECT idCombo FROM combos');
        $contador=0;
        foreach($rows2 as $var){
            $idCombo[$contador] = $var[0];
            $contador++;
        }
        
        for ($i = 0; $i < 50; $i++)
        {
            $id = $idCombo[$i];
            $num = rand (1, 4);
            for ($e = 1; $e <= $num; $e++ ) {
                
                $data[] = [
                    'idCombo' => $id,
                    'idProducto' =>$faker->unique->randomElement($array = $idProd)
                ];
            }
        }
        $table = $this->table('productos_combos');
        $table->insert($data)->save();
    }
}
