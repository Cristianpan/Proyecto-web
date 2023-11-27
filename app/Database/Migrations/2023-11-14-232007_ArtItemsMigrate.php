<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ArtItemsMigrate extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'artItemId' => [
                'type' => 'varchar', 
                'constraint' =>  32,  
            ], 
            'userId' => [
                'type' => 'varchar', 
                'constraint' => 36, 
            ],
            'artStyleId' => [
                'type' => 'int'
            ],
            'artTypeId' =>[
                'type' => 'int'
            ],
            'name' => [
                'type' => 'varchar',
                'constraint' => 50,  
            ], 
            'materials' => [
                'type' => 'varchar', 
                'constraint' => '255', 
            ], 
            'shortDescription' => [
                'type' => 'varchar', 
                'constraint' => 100, 
            ], 
            'description' => [
                'type' => 'text', 
            ],
            'measurements' => [
                'type' => 'varchar', 
                'constraint' => 100, 
            ], 
            'localOrigin' => [
                'type' => 'varchar', 
                'constraint' => 100, 
            ],
            'onSale' => [
                'type' => 'tinyint',  
            ],
            'price' => [
                'type' => 'decimal', 
                'constraint' => '10,2',
                'default' => 0.00
            ]
        ]); 

        $this->forge->addForeignKey('artTypeId', 'art_types', 'artTypeId', 'NO ACTION', 'NO ACTION', "artItems_artType_FK"); 
        $this->forge->addForeignKey('artStyleId', 'art_styles', 'artStyleId', 'NO ACTION', 'NO ACTION', "artItems_artStyle_FK"); 
        $this->forge->addForeignKey('userId', 'users', 'userId', 'CASCADE', 'CASCADE', "artItems_user_FK"); 
        $this->forge->addKey('artItemId', true); 
        $this->forge->createTable('art_items'); 
    }

    public function down()
    {
        $this->forge->dropTable('art_items'); 
    }
}
