<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionAbstrakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submission_abstrak', function (Blueprint $table) {
            $table->id('id_abs_submission');
            $table->integer('topic');
            $table->string('judul');
            $table->text('abstrak');
            $table->text('file_abs');
            $table->text('comment');
            $table->string('submited_at');
            $table->integer('decission_by');
            $table->string('decission_at');
            $table->integer('id_user');
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
        Schema::dropIfExists('submission_abstrak');
    }
}
