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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('edu_name',255);
            $table->timestamps();
        });

        DB::table('education')->insert([
            ['edu_name' => 'Higher Secondary education'],
            ['edu_name' => 'Certificate and Diploma'],
            ['edu_name' => 'Under-Graduate'],
            ['edu_name' => 'Post-Graduate'],
            ['edu_name' => 'Ph.D']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education');
    }
};
