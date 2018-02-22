<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Restaurants;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = 5;
        $restaurants = 10;

        factory(User::class,$users)->create();
        factory(Restaurants::class,$restaurants)->create();
    }
}
