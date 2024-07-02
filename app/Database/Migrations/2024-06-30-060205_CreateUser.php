<?php

namespace App\Database\Migrations\CreateUser;

use CodeIgniter\Database\Migration;

class CreateUser extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id' => [
                    'constraint' => 9,
                    'type' => 'INT',
                    'auto_increment' => true,
                ],
                'email' => [
                    'constraint' => 255,
                    'type' => 'VARCHAR'
                ],
                'username' => [
                    'constraint' => 255,
                    'type' => 'VARCHAR'
                ],
                'password' => [
                    'constraint' => 255,
                    'type' => 'VARCHAR'
                ],
            ]
        );
        $this->forge->addKey('id',true);
        $this->forge->createTable(('users'));
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
