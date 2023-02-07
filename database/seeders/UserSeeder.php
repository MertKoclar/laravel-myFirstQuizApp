<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        \App\Models\User::insert([
            'name'              => 'Mert Koçlar',
            'email'             => 'info@mertkoclar.com',
            'type'              => 'admin',
            'email_verified_at' => now(),
            'password'          => '$2y$10$tYfEG2YdVU5bkrVwS.MqHOz1nlcThirUDzzexIuuWdRv2.KRCt3Uu', // mert1212
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);
        
        \App\Models\User::factory(4)->create();
    }
}
