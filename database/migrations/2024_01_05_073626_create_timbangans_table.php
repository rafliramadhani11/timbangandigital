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
        Schema::create('timbangans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('anak_id')->nullable()->references('id')->on('anaks')->onDelete('cascade');

            $table->string('status')->nullable();
            $table->integer('umur')->nullable();

            $table->decimal('pb');
            $table->decimal('bb');
            $table->decimal('imt')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timbangans');
    }
};
