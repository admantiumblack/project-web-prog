<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('lecturer_id', 10)->nullable()->references('id')
            ->on('lecturers')->onDelete('set null')->onUpdate('cascade');
            $table->string('subject_id', 15)->nullable()->references('id')
            ->on('subjects')->onDelete('set null')->onUpdate('cascade');
            $table->longText('content');
            $table->string('title', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaints');
    }
}
