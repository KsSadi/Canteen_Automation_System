<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create Roles
        $roleGod = Role::create(['name' => 'superAdmin', 'guard_name' => 'admin']);
        $roleAdmin = Role::create(['name' => 'admin', 'guard_name' => 'admin']);
        $roleSubAdmin = Role::create(['name' => 'subAdmin', 'guard_name' => 'admin']);
        $roleManager = Role::create(['name' => 'manager', 'guard_name' => 'admin']);
        $roleSale = Role::create(['name' => 'sale', 'guard_name' => 'admin']);


        //Permissions
        $permissions = [
            'dashboard.view',

            //permissions names for admins
            'admin.create',
            'admin.view',
            'admin.edit',
            'admin.delete',
            'admin.approve',

            //permissions names for employee
            'employee.view',
            'employee.edit',
            'employee.create',
            'employee.delete',
            'employee.salary',
            'salary.delete',
            'salary.edit',
            //permissions names for role
            'role.create',
            'role.view',
            'role.edit',
            'role.delete',
            'role.approve',

            //permissions names for Salebale Products
            'sale.view',
            'sale.edit',
            'sale.create',
            'sale.delete',
            'sale.item.view',
            'sale.item.edit',
            'sale.item.create',
            'sale.item.delete',
            'sale.unit.view',
            'sale.unit.edit',
            'sale.unit.create',
            'sale.unit.delete',
            'sale.category.view',
            'sale.category.edit',
            'sale.category.create',
            'sale.category.delete',


            //permissions names for Purchase Products
            'purchase.view',
            'purchase.edit',
            'purchase.create',
            'purchase.delete',
            'purchase.item.view',
            'purchase.item.edit',
            'purchase.item.create',
            'purchase.item.delete',
            'purchase.unit.view',
            'purchase.unit.edit',
            'purchase.unit.create',
            'purchase.unit.delete',
            'purchase.category.view',
            'purchase.category.edit',
            'purchase.category.create',
            'purchase.category.delete',

            //permissions names for Stock
            'stock.view',
            'stockout.view',
            'stockout.create',

            //permissions names for Stock
            'report.view',


        ];

        //Create and Assign Premission for admin
        for ($i = 0; $i < count($permissions); $i++) {
            //Create Permission
            $permission = Permission::create(['name' => $permissions[$i], 'guard_name' => 'admin']);

            //Assign Permission to a Role
            $roleGod->givePermissionTo($permission);
        }


    }
}
