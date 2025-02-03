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
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->decimal('preco_venda',8,2);
            $table->decimal('preco_compra',8,2);
            $table->integer('quantidade');

            $table->unsignedBigInteger('editora_id');
            $table->foreign('editora_id')
                  ->references('id')
                  ->on('editoras')
                  ->onDelete('cascade');


            $table->unsignedBigInteger('autores_id');
            $table->foreign('autores_id')
                  ->references('id')
                  ->on('autores')
                  ->onDelete('cascade');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
