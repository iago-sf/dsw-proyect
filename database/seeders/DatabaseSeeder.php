<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Like;
use App\Models\Plant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* DB::delete('delete from user');
        DB::delete('delete from plant');
        DB::delete('delete from image');
        DB::delete('delete from like'); */
        User::factory(10)->create();
        Plant::factory()->count(20)->create();
        Image::factory()->count(50)->create();
        Like::factory()->count(200)->create();
    }
}
