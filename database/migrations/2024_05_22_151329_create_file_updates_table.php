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
        Schema::create('file_updates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subsidiary_id')
            ->nullable()
            ->constrained()
            ->cascadeOnUpdate();

            $table->foreignId('caixa_id')
            ->nullable()
            ->constrained()
            ->cascadeOnUpdate();

            $table->string('name');
            $table->string('path');
            $table->string('userName');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_updates');
    }
};
