<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participant_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_participant')->references('id_user')->on('m_user');
            $table->string('file_pembayaran');
            $table->integer('status');
            $table->string('jenis');
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
        Schema::dropIfExists('presenter_payments');
    }
}