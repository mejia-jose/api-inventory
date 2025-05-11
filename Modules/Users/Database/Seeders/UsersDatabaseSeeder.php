<?php

namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use Modules\Users\App\Models\Users;

class UsersDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Users::create([
            'name' => 'Admi Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Admin123'),
            'role' => 'admin',
        ]);
    }
}
