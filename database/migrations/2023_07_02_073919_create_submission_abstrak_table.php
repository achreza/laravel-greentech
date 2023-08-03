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
            $table->foreignId('id_topic')->references('id_topic')->on('topic');
            $table->string('judul');
            $table->text('abstrak');
            $table->text('file_abs');
            $table->text('comment')->nullable();
            $table->string('submited_at');
            $table->foreignId('id_status_abs')->references('id_status_abs')->on('m_status_abs');
            $table->foreignId('decission_by')->references('id_user')->on('m_user')->nullable();
            $table->string('decission_at')->nullable();
            $table->foreignId('id_user')->references('id_user')->on('m_user');
            $table->string('file_pembayaran');
            $table->integer('status_bayar')->default(0);
            $table->string('type_conference')->nullable();
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