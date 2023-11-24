<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ArtItemSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $artItem = [
            'artItemId' => '20582ad0-ac13-3219-a7a9-577f25392fc7',
            'userId'    => '20582ad0-ac13-3219-a7a9-577f25392fc8',
            'artStyleId' => 1, 
            'artTypeId' => 1, 
            'name' => "Obra", 
            'materials' => 'Acuarelas', 
            'shortDescription' => $faker->text(), 
            'description' => $faker->text(), 
            'measurements' => '120 x 230', 
            'localOrigin' => $faker->streetName(), 
            'onSale' => 1, 
            'price' => 1000.50,
        ];

        $this->db->table('art_items')->insert($artItem);
    }
}
