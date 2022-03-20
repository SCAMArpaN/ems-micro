<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hobby', function (Blueprint $table) {
            $table->id();
            $table->string("hobby_name");
            $table->timestamps();
        });

        DB::table('hobby')->insert([
            ['hobby_name' => 'Sports and Games'],
            ['hobby_name' => 'Social Activities'],
            ['hobby_name' => 'Collecting'],
            ['hobby_name' => 'Marketing'],
            ['hobby_name' => 'Creative'],
            ['hobby_name' => 'Making and tinkering'],
            ['hobby_name' => 'Outdoor recreation'],
            ['hobby_name' => 'Domestic']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hobby');
    }
};
