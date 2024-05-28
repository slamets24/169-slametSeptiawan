<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('acaras', function (Blueprint $table) {
            $table->id();
            $table->enum('namaAcara', ['AKAD', 'RESEPSI']);
            $table->date('tglAcara');
            $table->string('kecamatan');
            $table->string('kota');
            $table->string('provinsi');
            $table->text('alamatLengkap');
            $table->time('aMulai');
            $table->time('aSelesai');
            $table->string('linkGmaps');
            $table->text('embedGmaps');
            $table->unsignedBigInteger('idUndangan');
            $table->timestamps();
            // $table->foreign('idUndangan')->references('id')->on('undangans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acaras');
    }
};
