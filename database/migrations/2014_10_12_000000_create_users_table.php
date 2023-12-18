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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('region_id');

            $table->string('name');
            $table->string('username')->unique();
            $table->string('type');
            $table->string('password');

            $table->string('jeniskelamin')->nullable();
            $table->string('nohp')->nullable();
            $table->date('tgllahir')->nullable();
            $table->string('pekerjaan')->nullable();

            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('alamat')->nullable();

            $table->timestamps();

            $table->boolean('admin')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
