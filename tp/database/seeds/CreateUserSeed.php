<?php

use think\migration\Seeder;

class CreateUserSeed extends Seeder
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {

        $data  =
            [
                'user_name'        =>  'Bob',
                'password'        =>  '9OHkSqf4SZk',
                'status'            =>  '1 ',
            ];
        $this->table('user')->insert($data)->save();
    }
}