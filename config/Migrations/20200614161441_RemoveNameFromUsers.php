<?php
use Migrations\AbstractMigration;

class RemoveNameFromUsers extends AbstractMigration
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
        $table->removeColumn('name');
        $table->update();
    }

    public function down()
    {
        $table = $this->table('users');
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 60,
            'null' => false,
        ]);
        $table->update();
    }
}
