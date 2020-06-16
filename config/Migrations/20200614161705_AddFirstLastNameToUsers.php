<?php
use Migrations\AbstractMigration;

class AddFirstLastNameToUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $table = $this->table('users');
        $table->addColumn('first_name', 'string', [
            'default' => null,
            'limit' => 30,
            'null' => false,
            'after' => 'id'
        ]);
        $table->addColumn('last_name', 'string', [
            'default' => null,
            'limit' => 30,
            'null' => false,
            'after' => 'first_name'
        ]);
        $table->update();
    }

    public function down()
    {
        $table = $this->table('users');
        $table->removeColumn('first_name');
        $table->removeColumn('last_name');
        $table->update();
    }
}
