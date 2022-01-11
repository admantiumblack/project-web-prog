<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $path = 'form_results';
        $dirs = Storage::disk('google')->directories();
        if(count($dirs) > 0){
            Storage::disk('google')->deleteDirectory($dirs[0]);
        }
        Schema::create('forms', function (Blueprint $table) {
            $table->String('id', 11);
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
