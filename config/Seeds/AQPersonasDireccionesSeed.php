<?php
use Migrations\AbstractSeed;

/**
 * Telefonos seed.
 */
class AQPersonasDireccionesSeed extends AbstractSeed
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
        $pers  = $this->fetchAll('SELECT identificacion FROM personas' );
        $dist  = $this->fetchAll('SELECT * FROM distritos');
        for ($i = 0; $i < count($pers); $i++)
        {
	    $num = rand (0, count ($dist));
            $data[] = [
		'idPersona' => $pers [$i][0],
		'nombreProvincia' => $dist[$num]['nombreProvincia'],
                'nombreCanton'    => $dist[$num]['nombreCanton'],
                'nombreDistrito'  => $dist[$num]['nombreDistrito'],
                'detalles'        => $faker -> sentence ($nbWords=5, $variableNbWords = true)
	    ];
            /*$data[] = [
                'idPersona' => $pers [$i][0],
                'nombreProvincia' => 'Alajuela', //$dist[$num]['nombreProvincia'],
                'nombreCanton'    => 'Alajuela', //$dist[$num]['nombreCanton'],
                'nombreDistrito'  => 'Alajuela', //$dist[$num]['nombreDistrito'],
                'detalles' => $faker->sentence($nbWords = 5, $variableNbWords = true)
            ];*/
        }
        
        $table = $this->table('personas_direcciones');
        $table->insert($data)->save();
    }
}
