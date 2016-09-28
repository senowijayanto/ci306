<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_menu_roles extends CI_Migration {

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
      'menu_id' => array(
        'type' => 'INT',
        'constraint' => 11
      )
    ) );
    $this->dbforge->add_key( 'id', TRUE );
    $this->dbforge->create_table( 'menu_roles' );

		echo 'Upgrade 4';
  }

  public function down(){
		$this->dbforge->drop_table( 'menu_roles' );

		echo 'Downgrade 4';
	}
}
