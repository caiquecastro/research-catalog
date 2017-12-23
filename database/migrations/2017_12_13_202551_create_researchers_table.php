<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researchers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->date('birthday');
            $table->string('email');
            $table->string('address');
            $table->enum('gender', ['M', 'F']);
            $table->string('phone');
            $table->string('mobile_phone');
            $table->enum('status', ['active']);
            $table->unsignedInteger('role_id');
            $table->date('admission_date');
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('researchers');
    }
}
