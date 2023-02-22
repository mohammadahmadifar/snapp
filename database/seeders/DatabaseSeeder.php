<?php

namespace Database\Seeders;

use App\Constants\CartNumberConstants;
use App\Models\AccountNumber;
use App\Models\CartNumber;
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
        AccountNumber::factory(100)->create();
        CartNumber::factory(150)->create();

    }
}
