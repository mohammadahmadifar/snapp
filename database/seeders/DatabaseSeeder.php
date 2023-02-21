<?php

namespace Database\Seeders;

use App\Models\AccountNumber;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(50)->create();
        AccountNumber::factory(300)->create();

    }
}
