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
        Schema::create('itens_venda', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('vendas_id');
            $table->foreign('vendas_id')
                  ->references('id')
                  ->on('vendas')
                  ->onDelete('cascade');

            $table->decimal('preco_unitario',8,2);
            $table->integer('quantidade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens_venda');
    }
};
