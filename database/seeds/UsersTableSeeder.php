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
        $user = \App\User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'admin' => 1,
        ]);

        \App\Profile::create([
            'user_id' => $user->id,
            'avatar' => '/uploads/avatars/main_avatar.png',
            'about' => 'blq blq blq',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com',
        ]);
    }
}
