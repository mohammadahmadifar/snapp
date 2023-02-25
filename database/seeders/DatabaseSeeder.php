<?php

namespace Database\Seeders;

use App\Models\AccountNumber;
use App\Models\CardNumber;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();
        AccountNumber::factory(50)->create();
        CardNumber::factory(100)->create();

    }
}
