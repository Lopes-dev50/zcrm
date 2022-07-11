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
        Schema::create('imovels', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('site_id');

            $table->string('fotocapa')->nullable();
            $table->string('slug');

            $table->integer('equipe_id')->unsigned();
            $table->string('corretor')->nullable();
            $table->string('nomeimovel')->nullable();
            $table->string('endereco')->nullable();
            $table->integer('numero')->unsigned();
            $table->string('bairro')->nullable();
            $table->integer('CEP')->unsigned();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('tipo')->nullable();
            $table->string('locarvender')->nullable();
            $table->string('plantapronto')->nullable();

            $table->string('iptu')->nullable();
            $table->integer('quartos')->unsigned();
            $table->integer('banheiros')->unsigned();
            $table->integer('vaga')->unsigned();
            $table->integer('suite')->unsigned();
            $table->integer('metragem')->unsigned();
            $table->longtext('texto')->nullable();
            $table->string('video')->nullable();
            $table->string('valor')->nullable();
            $table->string('dono')->nullable();
            $table->string('docs')->nullable();
            $table->string('imcorporadora')->nullable();
            $table->integer('valorcondominio');
            $table->json('items');
            $table->boolean('destaque');
            $table->boolean('ativo');
            $table->integer('visitas')->unsigned();
            $table->integer('cod')->unsigned();
            $table->integer('anuncio')->unsigned();
            $table->text('perto')->nullable();
            $table->string('galeria')->nullable();
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
        Schema::dropIfExists('imovels');
    }
};
