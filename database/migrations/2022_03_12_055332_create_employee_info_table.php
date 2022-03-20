<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
         Schema::create('employee_info', function (Blueprint $table) {
             $table->id();
             $table->string("name", 255);
             $table->string("email")->unique();
             $table->enum("gender",['Male','Female','Other']);
             $table->string("contact_number",100);
             $table->text("address");
             $table->string("photo",255)->nullable();
             $table->date("joined");
             $table->date("dob");
             $table->unsignedBigInteger('d_id');
             $table->foreign("d_id")->references('id')->on('department');
             $table->unsignedBigInteger('h_id');
             $table->foreign("h_id")->references('id')->on('hobby');
             $table->unsignedBigInteger('ed_id');
             $table->foreign("ed_id")->references('id')->on('education');
             $table->string("experience",50);
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_info');
    }
};
