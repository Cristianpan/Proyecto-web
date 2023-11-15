<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class PersonalBlockSeeder extends Seeder
{
    public function run()
    {
        $this->db->query('SET foreign_key_checks = 0'); 
        $this->db->table('personal_blocks')->truncate(); 
        $faker = Factory::create(); 
        $personalBlocks = []; 
        for ($i=1; $i < 4; $i++) { 
            $personalBlocks[] = [
                'personalBlockId' => $faker->uuid(),
                'userId' => '20582ad0-ac13-3219-a7a9-577f25392fc8',
                'title' => "Bloque personal no. $i",
                'description' => $faker->text(),
            ];
        }

        $this->db->table('personal_blocks')->insertBatch($personalBlocks); 
    }
}
