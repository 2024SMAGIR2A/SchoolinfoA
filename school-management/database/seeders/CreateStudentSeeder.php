<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
            //create admin account
       $user = User::create([
        'matricule'=>"MAGIR011020",
        'first_name' => "Jean Paul",
        'last_name'=>"Geek",
        'gender'=>"HOMME",
        'email' => 'jean.paul@schoolmg.com',
        'password' => Hash::make('1357Student@'),
    ]);

if($user!=null){
    //assign role to student 
    $user->assignRole('Student');
}
    }
}
