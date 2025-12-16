<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sau = User::create([
            'user_name' => 'Yasser',
            'password' => '123456',
        ]);

        $sar = Role::create([
            'name' => 'Super-Admin',
        ]);

        $sau->assignRole($sar);
    }
}
