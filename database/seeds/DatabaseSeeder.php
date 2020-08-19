<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        DB::table('users')->insert([
            'name' => "Administrator",
            'email' =>'vjpking5913@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('landing_pages')->insert([
            [
                'id'=>1,
                'page_name'=>'G-Shock Dream Challenge',
            ],
            [
                'id'=>2,
                'page_name'=>'Thông tin sự kiện G-Shock Dream Challenge',
            ],
            [
                'id'=>3,
                'page_name'=>'Baby BA 130',
            ]
        ]);

        DB::table('preorder_pages')->insert([
            [
                'id'=>1,
                'name_page'=>'Pre-Order'
            ]
        ]);

    }
}
