<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'view tests',
            'create tests',
            'edit tests',
            'delete tests'
            
        ];

        foreach($permissions as $permission){
            Permission::create([
                'name' => $permission
            ]);
        }

        //admin
        $adminRole = Role::create([
            'name' => 'admin'
        ]);

        $adminRole->givePermissionTo([
            'view tests',
            'create tests',
            'edit tests',
            'delete tests'
        ]);

        //people
        $peopleRole = Role::create([
            'name' => 'people'
        ]);

        $peopleRole->givePermissionTo([
            'view tests'
        ]);

        //super admin
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('asdasdasd')
            
        ]);

        $user->assignRole($adminRole);

        //super admin
        $user2 = User::create([
            'name' => 'Visitor',
            'email' => 'visitor@admin.com',
            'password' => bcrypt('asdasdasd')
            
        ]);

        $user2->assignRole($peopleRole);
    }
}
