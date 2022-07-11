<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('equipe_id')->nullable();
            $table->string('corretor');
            $table->integer('coduni')->nullable();

            $table->string('nome_cliente')->nullable();;
            $table->string('celular_cliente')->nullable();;
            $table->string('email_cliente')->nullable();

            $table->string('renda_cliente')->nullable();
            $table->string('cidade_cliente')->nullable();
            $table->string('nascimento_cliente')->nullable();
            $table->string('bairro_interesse_cliente')->nullable();
            $table->string('empreendimento_cliente')->nullable();
            $table->string('fgts_cliente')->nullable();

            $table->string('etiqueta')->nullable();
            $table->string('nivel_cliente')->nullable();
            $table->string('origem_cliente')->nullable();
            $table->longtext('conversa_cliente')->nullable();
            $table->integer('controle_cliente')->nullable();
            $table->integer('impar')->nullable();
            $table->integer('ex_cliente')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
