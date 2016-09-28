<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_users extends CI_Migration {

  public function up() {
    $this->dbforge->add_field( array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'role_id' => array(
        'type' => 'INT',
        'constraint' => 11
      ),
      'username' => array(
        'type' => 'VARCHAR',
        'constraint' => 50
      ),
      'realname' => array(
        'type' => 'VARCHAR',
        'constraint' => 50
      ),
      'password' => array(
        'type' => 'VARCHAR',
        'constraint' => 150
      )
    ) );
    $this->dbforge->add_key( 'id', TRUE );
    $this->dbforge->create_table( 'users' );

		echo 'Upgrade 2';
  }

  public function down(){
		$this->dbforge->drop_table( 'users' );

		echo 'Downgrade 2';
	}
}
