<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_lecturers', function (Blueprint $table) {
            $table->string('id', 15);
            $table->string('subject_id', 15)->references('id')
                    ->on('subjects')->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->string('lecturer_id', 10)->references('id')
                    ->on('subjects')->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->string('period', 3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_lecturers');
    }
}
