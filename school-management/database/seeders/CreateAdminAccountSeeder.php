<?php

namespace Database\Seeders;

use Expection;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class CreateAdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tableHandle=[
            'collaborator',
            'student',
            'company',
            'job',
            'level',
            'speciality',
            'courses',
            'category',
            'classroom',
            'room',
            'timeTable',
            'payments',
            'note',
            'role',
            'permission',
            
        ];
        $permissionList=['create','edit','show','delete','list','trash','print'];
        
        try{
             Role::create(['name' => 'Super admin']);
             Role::create(['name' => 'Student']);
             Role::create(['name' => 'Teacher']);
        }
        catch(\Exception $e){
           
        }

        foreach ($tableHandle as $item) {
            foreach ($permissionList as $permission) {
                try{
                   Permission::create(['name' => $item.'-'.$permission]);
                }
                catch(\Exception $e){
                    continue;
                }
                
            }
        }
        
        //create company
        Company::create([
            'name' => "MGSchool Company",
            'acronym'=>"SchoolMG",
            'email' => "admin@schoolmg.com",
            
        ]);

        //create admin account
       $user = User::create([
            'matricule'=>"Admin01",
            'first_name' => "Admin Inspro",
            'last_name'=>"Geek",
            'gender'=>"HOMME",
            'email' => 'admin@schoolmg.com',
            'password' => Hash::make('1357SchoolMG@'),
        ]);
    
    if($user!=null){
        //assign all permissions to super admin 
        $this->call(SuperAdminSeeder::class);
        $user->assignRole('Super admin');
    }
    }
}
