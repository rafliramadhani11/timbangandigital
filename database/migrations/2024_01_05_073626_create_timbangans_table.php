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

            $table->integer('umur')->nullable();

            $table->string('imt_status')->nullable();
            $table->string('pb_status')->nullable();
            $table->string('bb_status')->nullable();

            $table->float('pb')->default(0);
            $table->float('bb')->default(0);
            $table->float('imt')->default(0);

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
