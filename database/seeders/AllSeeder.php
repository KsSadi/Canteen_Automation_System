<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Employee;
use App\Models\Expenses;
use App\Models\pCategory;
use App\Models\PurchaseItem;
use App\Models\PurchaseUnit;
use App\Models\Salary;
use App\Models\SaleItem;
use App\Models\SaleUnit;
use App\Models\sCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Saleable Product
        //  Saleable Categories
        sCategory::create([
            'id' => 1,
            'name' => 'Fried Burns Item'
        ]);
        sCategory::create([
            'id' => 2,
            'name' => 'Baked Item'
        ]);
        sCategory::create([
            'id' => 3,
            'name' => 'Coocked Item'
        ]);
        sCategory::create([
            'id' => 4,
            'name' => 'Drinking Ingredients'
        ]);
        sCategory::create([
            'id' => 5,
            'name' => 'Dry Food Item'
        ]);
        // Saleable  Unit
        SaleUnit::create([
            'id' => 1,
            'name' => 'Pcs'
        ]);
        SaleUnit::create([
            'id' => 2,
            'name' => 'Dish'
        ]);
        SaleUnit::create([
            'id' => 3,
            'name' => 'ML'
        ]);
        SaleUnit::create([
            'id' => 4,
            'name' => 'Packet'
        ]);
        SaleUnit::create([
            'id' => 5,
            'name' => 'Liter'
        ]);
        // Saleable  Item
        SaleItem::create([
            'name' => 'Shingara',
            'scat_id' => 1,
            'sunit_id' => 1,
            'price' => 8.00,
        ]);
        SaleItem::create([
            'name' => 'Shingara',
            'scat_id' => 1,
            'sunit_id' => 1,
            'price' => 80.00,
        ]);
        SaleItem::create([
            'name' => 'Chamocha',
            'scat_id' => 1,
            'sunit_id' => 1,
            'price' => 8.00,
        ]);
        SaleItem::create([
            'name' => 'Pakora',
            'scat_id' => 1,
            'sunit_id' => 1,
            'price' => 15.00,
        ]);
        SaleItem::create([
            'name' => 'Egg Chop',
            'scat_id' => 1,
            'sunit_id' => 1,
            'price' => 15.00,
        ]);
        SaleItem::create([
            'name' => 'Sandwich',
            'scat_id' => 2,
            'sunit_id' => 1,
            'price' => 50.00,
        ]);
        SaleItem::create([
            'name' => 'Fried Chicken',
            'scat_id' => 1,
            'sunit_id' => 1,
            'price' => 80.00,
        ]);
        SaleItem::create([
            'name' => 'Khichuri',
            'scat_id' => 3,
            'sunit_id' => 2,
            'price' => 70.00,
        ]);
        SaleItem::create([
            'name' => 'Mum Water 250 ML',
            'scat_id' => 4,
            'sunit_id' => 3,
            'price' => 20.00,
        ]);
        SaleItem::create([
            'name' => 'Bombay Sweets Potato Crackers',
            'scat_id' => 5,
            'sunit_id' => 4,
            'price' => 10.00,
        ]);
        SaleItem::create([
            'name' => 'Cocacola 600 ML',
            'scat_id' => 4,
            'sunit_id' => 5,
            'price' => 40.00,
        ]);


        // Purchase Product
        // Purchase Product Categories
        pCategory::create([
            'id' => 1,
            'name' => 'Sauses Item'
        ]);

        pCategory::create([
            'id' => 2,
            'name' => 'Vegetables Item'
        ]);
        pCategory::create([
            'id' => 3,
            'name' => 'Herbs Item'
        ]);
        pCategory::create([
            'id' => 4,
            'name' => 'Grocery Item'
        ]);
        pCategory::create([
            'id' => 5,
            'name' => 'Spices'
        ]);
        pCategory::create([
            'id' => 6,
            'name' => 'Meet'
        ]);
        // Purchase Product Unit
        PurchaseUnit::create([
            'id' => 1,
            'name' => 'Liter'
        ]);

        PurchaseUnit::create([
            'id' => 2,
            'name' => 'KG'
        ]);
        PurchaseUnit::create([
            'id' => 3,
            'name' => 'Packet'
        ]);

        PurchaseUnit::create([
            'id' => 4,
            'name' => 'Milli liters'
        ]);
        PurchaseUnit::create([
            'id' => 5,
            'name' => 'Gram'
        ]);

        PurchaseUnit::create([
            'id' => 6,
            'name' => 'Piece'
        ]);

        // Purchase Product Item
        PurchaseItem::create([
            'name' => 'Ginger',
            'pcat_id' => 4,
            'punit_id' => 2,
            'price' => 80.00,
        ]);
        PurchaseItem::create([
            'name' => 'Pulses',
            'pcat_id' => 3,
            'punit_id' => 2,
            'price' => 70.00,
        ]);
        PurchaseItem::create([
            'name' => 'Rice',
            'pcat_id' => 4,
            'punit_id' => 2,
            'price' => 70.00,
        ]);
        PurchaseItem::create([
            'name' => 'Gram',
            'pcat_id' => 4,
            'punit_id' => 2,
            'price' => 80.00,
        ]);
        PurchaseItem::create([
            'name' => 'Chicken',
            'pcat_id' => 6,
            'punit_id' => 2,
            'price' => 170.00,
        ]);
        PurchaseItem::create([
            'name' => 'Beef',
            'pcat_id' => 6,
            'punit_id' => 2,
            'price' => 750.00,
        ]);
        PurchaseItem::create([
            'name' => 'Coriander Leaves',
            'pcat_id' => 2,
            'punit_id' => 5,
            'price' => 20.00,
        ]);
        PurchaseItem::create([
            'name' => 'Egg',
            'pcat_id' => 4,
            'punit_id' => 6,
            'price' => 12.00,
        ]);
        PurchaseItem::create([
            'name' => 'Pran green Chilli Sause',
            'pcat_id' => 1,
            'punit_id' => 5,
            'price' => 120.00,
        ]);
        PurchaseItem::create([
            'name' => 'Pran Hot Tomato Sause',
            'pcat_id' => 1,
            'punit_id' => 5,
            'price' => 170.00,
        ]);
        PurchaseItem::create([
            'name' => 'Oyster Sause',
            'pcat_id' => 1,
            'punit_id' => 5,
            'price' => 200.00,
        ]);
        // Others Expense
        Expenses::create([
            'name' => 'Electricity Bill',
            'note' => 'Payment By bKash',
            'date' => '2022-06-05',
            'amount' => 1980.00,
        ]);
        Expenses::create([
            'name' => 'Gas Bill',
            'note' => 'Bank Payment',
            'date' => '2022-06-05',
            'amount' => 975.00,
        ]);
        // Employeee

        Employee::create([
            'id' => 1,
            'name' => 'Seikh Afrin',
            'email' => 'afrin@gmail.com',
            'mobile' => 01622000440,
            'post' => 'Manager',
            'salary' => 10000.00,
            'join_date' => '2022-01-01',
        ]);
        Employee::create([
            'id' => 2,
            'name' => 'Evan Rahman',
            'email' => 'evan@gmail.com',
            'mobile' => 01622123466,
            'post' => 'Chef',
            'salary' => 5000.00,
            'join_date' => '2022-03-01',
        ]);
        Employee::create([
            'id' => 3,
            'name' => 'Khaleda Akhter',
            'email' => 'khaleda@gmail.com',
            'mobile' => 01622456455,
            'post' => 'Cleaner',
            'salary' => 2000.00,
            'join_date' => '2022-02-01',
        ]);
        Employee::create([
            'id' => 4,
            'name' => 'Ekram Ahmed',
            'email' => 'ekram@gmail.com',
            'mobile' => 01622456452,
            'post' => 'Waiter',
            'salary' => 3000.00,
            'join_date' => '2022-02-10',
        ]);
        // Employee Salary
        Salary::create([
            'employee' => 1,
            'designation' => 'Manager',
            'note' => 'Bank Transfer',
            'salary_date' => '2022-06-02',
            'salary' => 10000.00,
        ]);
        Salary::create([
            'employee' => 2,
            'designation' => 'Chef',
            'note' => 'Cash',
            'salary_date' => '2022-06-02',
            'salary' => 5000.00,
        ]);
        Salary::create([
            'employee' => 3,
            'designation' => 'Cleaner',
            'note' => 'Cash',
            'salary_date' => '2022-06-02',
            'salary' => 2000.00,
        ]);
        Salary::create([
            'employee' => 4,
            'designation' => 'Waiter',
            'note' => 'Cash',
            'salary_date' => '2022-06-02',
            'salary' => 3000.00,
        ]);

       Admin::create([
            'name' => 'Asif',
            'email' => 'manager@demo.com',
            'username' => 'asif',
            'phone' => '01765885448',
            'password' => Hash::make('manager123'),

        ]);
        Admin::create([
            'name' => 'Shamim',
            'email' => 'sales@demo.com',
            'username' => 'Shamim',
            'phone' => '01865889874',
            'password' => Hash::make('sales123'),

        ]);







    }
}
