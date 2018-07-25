<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User([
            'name' => 'Admin',
            'email' => 'nbagonoc@gmail.com',
            'password' => Hash::make('popopo'),
            'role' => 'admin'
        ]);
        $user->save();

        $user = new \App\User([
            'name' => 'Sample User',
            'email' => 'nbagonoc.backup@gmail.com',
            'password' => Hash::make('popopo'),
            'role' => 'user'
        ]);
        $user->save();
    }
}