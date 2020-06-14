<?php
use Migrations\AbstractMigration;

class Users extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users');

        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 60,
            'null' => false,
        ]);

        $table->addColumn('sex', 'string', [
            'default' => '0',
            'limit' => 1,
            'null' => false,
        ]);

        $table->addColumn('tell', 'string', [
            'default' => null,
            'limit' => 18,
            'null' => false,
        ]);

        $table->addColumn('email', 'string', [
            'default' => null,
            'limit' => 254,
            'null' => false,
            'unique' => true
        ]);

        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);

        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        //論理削除用カラム
        $table->addColumn('deleted', 'datetime', [
            'default' => null,
            'null' => true,
        ]);

        $table->create();
    }
}
