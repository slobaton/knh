<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use App\User;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'role-show',
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }

        //Admin
        $admin = Role::create(['name' => 'admin']);

        $admin->givePermissionTo([
            'role-list',
            'role-edit',
            'role-show',
            'role-delete',
            'role-create'
        ]);

        $user = User::find(1); //Sergio Lobaton
        $user->assignRole('admin');
    }
}
