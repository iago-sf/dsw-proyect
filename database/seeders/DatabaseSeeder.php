<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Like;
use App\Models\Plant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::delete('delete from users');
        DB::delete('delete from plants');
        DB::delete('delete from images');
        DB::delete('delete from likes');
        User::create([
            'name' => 'iago', 
            'email' => 'iago@gmail.com', 
            'password' => '$2a$10$UTJtmBPRahpzLtcAJ6tZceplpmFrq9ow3RPIXbbhyVGPTHCSQXgU.', 
            'email_verified_at' => now(), 
            'remember_token' => Str::random(10)
        ]);
        User::factory(10)->create();
        Plant::factory()->count(20)->create();
        Image::factory()->count(50)->create();
        Like::factory()->count(200)->create();
    }
}
