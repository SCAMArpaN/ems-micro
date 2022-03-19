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
        /* Schema::create('employee_info', function (Blueprint $table) {
            $table->id();
            $table->string("employee_name", 255);
            $table->string("email")->unique();
            $table->enum("gender",['male','female','trans']);
            $table->string("contact_number",100);
            $table->text("address");
            $table->timestamps();
        }); */
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
