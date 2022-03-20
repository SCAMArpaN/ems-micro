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
        Schema::create('department', function (Blueprint $table) {
            $table->id();
            $table->string('depart_name',255);
            $table->timestamps();
        });

        DB::table('department')->insert([
            ['depart_name' => 'Export'],
            ['depart_name' => 'Sales'],
            ['depart_name' => 'Information Technology'],
            ['depart_name' => 'Marketing'],
            ['depart_name' => 'Human Resources'],
            ['depart_name' => 'Production'],
            ['depart_name' => 'Operations'],
            ['depart_name' => 'R&D']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department');
    }
};
