<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contatos', function (Blueprint $table){
            $table -> id();
            $table->string('name');
            $table->string('telefone');
            $table ->integer('idade');

            $table ->string('rua');
            $table ->integer('numero');
            $table ->string('cep');
            $table ->string('complement') -> nullable();
            $table ->string('estado');
            $table ->string('cidade');
            $table ->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
