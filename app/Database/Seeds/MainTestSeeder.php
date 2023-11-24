<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MainTestSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserSeeder');
        $this->call('PersonalBlockSeeder');
        $this->call('OccupationSeeder');
    }
}
