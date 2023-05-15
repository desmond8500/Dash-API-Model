<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // protected $model = Client::class;

    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Client::factory(10)->create();
    }
}
