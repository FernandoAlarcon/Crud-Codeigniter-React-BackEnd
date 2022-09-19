<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
class Migration_Cantantes extends CI_Migration { 
    public function up() { 
            $this->dbforge->add_field(array(
            'id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'nombres' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
            ), 
            'pais' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
            ),
            'fecha_nacimiento' => array(
                    'type' => 'timestamp',
                    'constraint' => 250,
                    'null' => true
            ), 
            'description' => array(
                    'type' => 'TEXT',
                    'null' => TRUE
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('cantantes');
    }

    public function down()
    {
        $this->dbforge->drop_table('cantantes');
    }
}