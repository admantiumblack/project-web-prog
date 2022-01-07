<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClusterSccsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cluster_sccs', function (Blueprint $table) {
            $table->date('date_appointed');
            $table->foreignId('cluster_id')->references('id')
                    ->on('clusters')->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->string('lecturer_id', 10)->references('id')
                    ->on('lecturers')->onDelete('cascade')
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
        Schema::dropIfExists('cluster_sccs');
    }
}
