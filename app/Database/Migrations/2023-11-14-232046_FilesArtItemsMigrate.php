<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ArtItemFilesMigrate extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'artItemFileId' => [
                'type' => 'int', 
                'auto_increment' => true
            ],
            'artItemId' => [
                'type' => 'varchar', 
                'constraint' => 255, 
            ], 
        ]); 

        $this->forge->addForeignKey('artItemId', 'art_items', 'artItemId', 'CASCADE', 'CASCADE', 'art_item_FK'); 
        $this->forge->addKey('artItemFileId', true); 
        $this->forge->createTable('art_item_files'); 
    }

    public function down()
    {
        $this->forge->dropTable('art_item_files'); 
    }
}
