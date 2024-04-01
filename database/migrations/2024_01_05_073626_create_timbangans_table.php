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

            $table->foreignId('anak_id')->nullable()
                ->references('id')->on('anaks')->onDelete('cascade');

            $table->integer('umur')->nullable();

            $table->string('imt_status')->default('-');
            $table->string('pb_status')->default('-');
            $table->string('bb_status')->default('-');

            $table->float('pb');
            $table->float('bb');
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
