<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \Flommerce\User([
            'first_name'    => 'Test',
            'last_name'     =>  'User',
            'email' =>  'test@test.com',
            'password'      =>  bcrypt('test123'),
        ]);
        $user->save();
    }
}
