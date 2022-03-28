<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNoTelpToMonitorings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monitorings', function (Blueprint $table) {
            $table->string('no_telp')->nullable();
            $table->string('nis')->nullable();
            $table->string('name')->nullable();
            $table->string('kode')->nullable();
            $table->string('skor')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monitorings', function (Blueprint $table) {
            $table->dropColumn('no_telp');
        });
    }
}
