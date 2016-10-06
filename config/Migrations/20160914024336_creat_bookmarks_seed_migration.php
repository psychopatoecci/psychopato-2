<?php

use Phinx\Migration\AbstractMigration;

class CreatBookmarksSeedMigration extends AbstractMigration
{

    public function up()
    {
		$faker = \Faker\Factory::Create();
		$populator = new Faker\ORM\CakePHP\Populator($faker);
		
		$populator->addEntity('bookmarks',200,[
			'title'=> function() use ($faker){
				return $faker->sentence($nbWords=3,$variableWords=true);
			},
			'url' =>function()use($faker){
				return $faker->paragraph($nbSentences=3,$variableSentences=true);
			},
			'created'=>function () use ($faker){
				return $faker->dateTimeBetween($startDate = 'now',$endDate ='now'); 
			},
			'modified'=>function()use ($faker){
				return $faker->dateTimeBetween($startDate = 'now', $endDate ='now');
			},
			'user_id'=>function(){
				return rand(1,51);
			}
		]);
		$populator->execute();
    }
}
