<?php
use Migrations\AbstractSeed;

/**
 * Telefonos seed.
 */
class TelefonosSeed extends AbstractSeed
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
        $contador=0;
        foreach($rows as $var){
            $idPer[$contador] = $var[0];
            $contador++;
        }
        $tipos = ["Casa","Celular","Trabajo","Otro"];
        foreach($idPer as $var)
        {
            $data[] = [
                'identificacion' => $var,
                'tipo_tel' => $tipos[rand (0,3)],
                'telefono' => 
                    $faker->numberBetween($min = 20000000, $max = 89999999)
            ];
        }
        $table = $this->table('telefonos_personas');
        $table->insert($data)->save();
        
    }
}
