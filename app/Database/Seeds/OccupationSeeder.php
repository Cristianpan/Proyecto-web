<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OccupationSeeder extends Seeder
{
    public function run()
    {
        $options = [
            'Pintor', 'Escultor', 'Ilustrador', 'Diseñador Gráfico', 'Fotógrafo',
            'Artista Digital', 'Muralista', 'Artista Textil', 'Animador',
        ];

        $occupations = [];
        foreach ($options as $value) {
           $occupations[]['type'] = $value;
        }

        $this->db->table('occupations')->insertBatch($occupations); 
    }
}
