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
        Schema::table('users', function (Blueprint $table) {

            $table->boolean('is_active');

            $table->string('equipe_id')->nullable();
            $table->string('tempo');

            $table->string('celular')->nullable();
            $table->string('CPF')->nullable();
            $table->string('cidade')->nullable();
            $table->string('creci')->nullable();
            $table->string('plano')->default('FREE');

            $table->string('onde')->nullable();
            $table->string('pgcaptura')->nullable();
            $table->string('subdomain')->nullable();
            $table->integer('valor')->default(100);
            $table->integer('nivel')->nullable(1);
            $table->integer('notifica')->nullable();




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->boolean('is_active');

            $table->string('equipe_id')->nullable();
            $table->string('tempo');

            $table->string('celular')->nullable();
            $table->string('CPF')->nullable();
            $table->string('cidade')->nullable();
            $table->string('creci')->nullable();
            $table->string('plano')->default('FREE');

            $table->string('onde')->nullable();
            $table->string('pgcaptura')->nullable();
            $table->string('subdomain')->nullable();
            $table->integer('valor')->default(100);
            $table->integer('nivel')->nullable();
            $table->integer('notifica')->nullable();



        });
    }
};
