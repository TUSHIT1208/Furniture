<?php

namespace Database\Seeders;

use App\Models\admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        admin::create([
            'username' => 'admin@gmail.com',
            'password' => 'admin_123',
        ]);
    }
}
