<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturers', function (Blueprint $table) {
            $table->string('id', 10);
            $table->string('name', 100);
            $table->string('password', 64);
            $table->string('phone_number', 20);
            $table->string('email', 100);
            $table->foreignId('position_id')->nullable();
            $table->foreign('position_id')->references('id')
                    ->on('positions')->onDelete('set null')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecturers');
    }
}
