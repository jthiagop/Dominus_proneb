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
        Schema::create('lanc_bancos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subsidiary_id')
            ->nullable()
            ->constrained()
            ->cascadeOnUpdate();

            $table->date('data');
            $table->string('tipo');
            $table->string('lp');
            $table->string('tipo_documento');
            $table->string('num_documento');
            $table->decimal('valor', 10,2);
            $table->string('arquivo')->nullable();
            $table->string('origem')->nullable();
            $table->string('banco')->nullable();
            $table->string('userName')->nullable();
            $table->text('complemento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lanc_bancos');
    }
};
