<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKandidatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kandidats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kandidat');
            $table->string('foto_kandidat')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('nbm')->unique()->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->integer('status')->default('1');


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
        Schema::dropIfExists('kandidats');
    }
}
