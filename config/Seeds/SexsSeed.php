<?php

use Migrations\AbstractSeed;

/**
 * Sexs seed.
 */
class SexsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $datetime = date('Y-m-d H:i:s');
        $data =
            [
                [
                    'code' => '0',
                    'name' => '未入力',
                    'created' => $datetime
                ],
                [
                    'code' => '1',
                    'name' => '男性',
                    'created' => $datetime
                ],
                [
                    'code' => '2',
                    'name' => '女性',
                    'created' => $datetime
                ],
                [
                    'code' => '9',
                    'name' => 'その他',
                    'created' => $datetime
                ]
            ];

        $table = $this->table('sexs');
        $table->insert($data)->save();
    }
}
