<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $now = Carbon::now()->toDatetimeString();

        DB::table('users')->insert([
            'name' => 'Jean-Philippe Murray',
            'email' => 'curieuxmurray@gmail.com',
            'password' => '$2y$10$m2dM8OKdStwNizzTmpd2Ye.zNxiRQLGcotXDkkUAeC6fbGooKo9pK',
            'remember_token' => null,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
