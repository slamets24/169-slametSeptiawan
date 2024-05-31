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
        Schema::create('documentations', function (Blueprint $table) {
            $table->id();
            $table->string('fFormalPria')->nullable();
            $table->string('fFormalWanita')->nullable();
            $table->longText('fWedding')->nullable();
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
        Schema::dropIfExists('documentations');
    }
};
