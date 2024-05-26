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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('subsidiary_user', function (Blueprint $table) {
            $table->foreignId('user_id')
            ->nullable()
            ->constrained()
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('subsidiary_id')
            ->nullable()
            ->constrained()
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->primary(['user_id', 'subsidiary_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subsidiary_user');
        Schema::dropIfExists('roles');
    }
};
