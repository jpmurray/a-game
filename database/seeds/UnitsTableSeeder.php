<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDatetimeString();

        // relalists
        DB::table('units')->insert([
            'type_id' => 1,
            'name' => 'Infantry',
            'type' => 'off',
            'atk' => 10,
            'def' => 3,
            'cost' => 10,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('units')->insert([
            'type_id' => 1,
            'name' => 'Reservist',
            'type' => 'def',
            'atk' => 3,
            'def' => 10,
            'cost' => 10,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('units')->insert([
            'type_id' => 1,
            'name' => 'Marines',
            'type' => 'spec',
            'atk' => 15,
            'def' => 6,
            'cost' => 20,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // fantasy
        DB::table('units')->insert([
            'type_id' => 2,
            'name' => 'Orc',
            'type' => 'off',
            'atk' => 10,
            'def' => 3,
            'cost' => 10,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('units')->insert([
            'type_id' => 2,
            'name' => 'Elf',
            'type' => 'def',
            'atk' => 3,
            'def' => 10,
            'cost' => 10,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('units')->insert([
            'type_id' => 2,
            'name' => 'Dragon',
            'type' => 'spec',
            'atk' => 10,
            'def' => 10,
            'cost' => 20,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
