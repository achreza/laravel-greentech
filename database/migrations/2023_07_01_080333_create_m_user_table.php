<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_user', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nama');
            $table->string('email');
            $table->string('no_telp');
            $table->string('institusi');
            $table->string('negara');
            $table->string('jenis_kelamin');
            $table->integer('id_role_user');
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
        Schema::dropIfExists('m_user');
    }
}
