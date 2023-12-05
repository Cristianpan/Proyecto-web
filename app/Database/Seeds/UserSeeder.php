<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UserSeeder extends Seeder
{
    public function run()
    {
        $this->db->query('SET foreign_key_checks = 0'); 
        $this->db->table('users')->truncate();
        $faker = Factory::create();
        $user = [
            'userId'    => '20582ad0-ac13-3219-a7a9-577f25392fc8',
            'name'  => $faker->name(),
            'lastName'  => $faker->lastName(),
            'email'     => 'email@email.com',
            'password'  => password_hash('test_password', PASSWORD_BCRYPT),
            'token'     => $faker->uuid(),
            'confirmed' => 0,
        ];

        $this->db->table('users')->insert($user);
    }
}
