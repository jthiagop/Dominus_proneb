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
        Schema::create('subsidiaries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('company_id')
                    ->nullable()
                    ->constrained()
                    ->cascadeOnUpdate()
                    ->cascadeOnDelete();
            $table->string('cnpj')->unique();
            $table->date('data_cnpj')->nullable();
            $table->date('data_fundacao')->nullable();
            $table->string('created_by')->nullable();

            $table->enum('natureza', ['matriz', 'filial'])->nullable();
            $table->enum('status', ['0', '1'])->nullable();
            //status: 1 - ativo, 2 - inativo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subsidiaries');
    }
};
