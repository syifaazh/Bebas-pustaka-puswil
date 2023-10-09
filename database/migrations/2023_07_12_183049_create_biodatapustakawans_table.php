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
        Schema::create('biodatapustakawans', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('users_id');
            $table->string('nim');
            $table->string('no_anggota');
            $table->text('pendidikan');
            $table->text('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodatapustakawans');
    }
};
