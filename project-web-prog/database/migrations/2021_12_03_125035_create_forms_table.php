<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;
class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $path = public_path('storage/form_results');
        if(file_exists($path)){
            File::deleteDirectory($path);
        }
        Schema::create('forms', function (Blueprint $table) {
            $table->string('subject_id', 15)->nullable()
                    ->references('id')
                    ->on('subjects')->onDelete('set null')
                    ->onUpdate('cascade');
            $table->datetime('deadline');
            $table->string('period', 3);
            $table->text('result_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
