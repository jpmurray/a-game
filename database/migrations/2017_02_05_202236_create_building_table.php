<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_schedules', function (Blueprint $table) {
            $table->integer('faction_id');
            $table->integer('building_id');
            for ($i=0; $i < 24; $i++) {
                $table->integer("day_{$i}")->default(0);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('building_schedules');
    }
}
