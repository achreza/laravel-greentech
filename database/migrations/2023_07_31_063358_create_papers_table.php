<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papers', function (Blueprint $table) {
            $table->id('id_paper');
            $table->string('judul');
            $table->string('author');
            $table->string('author_email');
            $table->string('file_paper');
            $table->foreignId('submitter')->references('id_user')->on('m_user');
            $table->foreignId('id_abstrak')->references('id_abs_submission')->on('submission_abstrak');
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
        Schema::dropIfExists('papers');
    }
}