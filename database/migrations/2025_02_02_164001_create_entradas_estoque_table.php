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
        Schema::create('entradas_estoque', function (Blueprint $table) {
            $table->id();
            $table->integer('quantidade');
            $table->decimal('preco_compra',8,2);
            $table->date('data_entrada');
            
            $table->unsignedBigInteger('livros_id');
            $table->foreign('livros_id')
                  ->references('id')
                  ->on('livros')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas_estoque');
    }
};
