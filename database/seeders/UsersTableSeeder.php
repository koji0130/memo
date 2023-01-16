<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'over_name' => '大谷',
            'under_name' => '紘平',
            'over_name_kana' => 'オオタニ',
            'under_name_kana' => 'コウヘイ',
            'mail_address' => 'otani@usen.com',
            'sex' => 1,
            'birth_day' => '19931224',
            'password' =>  bcrypt('otani'),
        ]);
    }
}
