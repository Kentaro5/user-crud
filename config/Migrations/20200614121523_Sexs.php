<?php
use Migrations\AbstractMigration;

class Sexs extends AbstractMigration
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
        $table = $this->table('sexs');

        $table->addColumn('code', 'string', [
            'default' => '0',
            'limit' => 1,
            'null' => false,
        ]);

        $table->addColumn('name', 'string', [
            'default' => '未入力',
            'limit' => 3,
            'null' => false,
        ]);
    }
}
