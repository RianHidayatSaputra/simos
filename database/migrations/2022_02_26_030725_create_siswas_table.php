<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->string('name');
            $table->text('alamat');
            $table->string('no_telp');

            $table->unsignedBigInteger('id_rombel');
            $table->foreign('id_rombel')->references('id')->on('rombels');

            $table->string('username');
            $table->string('password');

            $table->unsignedBigInteger('id_ortu');
            $table->foreign('id_ortu')->references('id')->on('orangtuas');

            $table->unsignedBigInteger('id_rayon');
            $table->foreign('id_rayon')->references('id')->on('rayons');

            $table->unsignedBigInteger('id_guru');
            $table->foreign('id_guru')->references('id')->on('gurus');

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
        Schema::dropIfExists('siswas');
    }
}
