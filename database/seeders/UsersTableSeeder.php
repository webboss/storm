<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'author no define',
                'email' => 'author@none.ua',
                'password' => bcrypt(Str::random(16)),
            ],
            [
                'name' => 'Author Authorovich',
                'email' => 'author@define.ua',
                'password' => bcrypt('123456'),
            ]
        ];

        \DB::table('users')->insert($data);
    }
}
