<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_seller = new Role();
        $role_seller->name = 'supplier';
        $role_seller->save();

        $role_buyer = new Role();
        $role_buyer->name = 'custommer';
        $role_buyer->save();

        $role_buyer = new Role();
        $role_buyer->name = 'super_admin';
        $role_buyer->save();
    }
}
