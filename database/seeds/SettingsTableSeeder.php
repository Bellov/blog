<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name' => 'Hacking Blog',
            'contact_number' => '0888888888',
            'contact_email' => 'hacking@gmail.com',
            'address' => 'Paradise 22',
        ]);
    }
}
