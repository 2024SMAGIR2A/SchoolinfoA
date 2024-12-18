<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateAllAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create admin account all defaults roles and permissions
        $this->call(CreateAdminAccountSeeder::class);
        //create student account
        $this->call(CreateStudentSeeder::class);
    }
}
