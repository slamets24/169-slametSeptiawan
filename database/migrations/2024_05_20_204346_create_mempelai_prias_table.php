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
        Schema::create('mempelai_prias', function (Blueprint $table) {
            $table->id();
            $table->string('nmMempelaiPria');
            $table->string('nmIbu');
            $table->string('nmBapak');
            $table->enum('nRekening', ['bca', 'bri', 'mandiri', 'dana']);
            $table->bigInteger('noRek');
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
        Schema::dropIfExists('mempelai_prias');
    }
};
