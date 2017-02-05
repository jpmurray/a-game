<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $now = Carbon::now()->toDatetimeString();

        DB::table('types')->insert([
            'id' => 1,
            'name' => 'Realists',
            'currency' => 'dollar',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('types')->insert([
            'id' => 2,
            'name' => 'Tolkienists',
            'currency' => 'gold',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
