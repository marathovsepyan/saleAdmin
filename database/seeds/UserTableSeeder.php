<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $role_seller = Role::where('name','supplier')->first();
        $role_buyer  = Role::where('name', 'customer ')->first();
        $role_admin  = Role::where('name', 'super_admin')->first();
        $seller = new User();
        $seller->name = 'Supplier Name';
        $seller->email = 'supplier@example.com';
        $seller->password = bcrypt('secret');
        $seller->save();
        $seller->roles()->attach($role_seller);

        $buyer = new User();
        $buyer->name = 'Customer Name';
        $buyer->email = 'customer@example.com';
        $buyer->password = bcrypt('secret');
        $buyer->save();
        $buyer->roles()->attach($role_buyer);

        $buyer = new User();
        $buyer->name = 'Super Admin';
        $buyer->email = 'admin@example.com';
        $buyer->password = bcrypt('secret');
        $buyer->save();
        $buyer->roles()->attach($role_admin);
  }
}
