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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id');
            $table->string('name');
            $table->string('sobretexto')->nullable();
            $table->string('sobre')->nullable();
            $table->integer('pix')->nullable();
            $table->string('fabebookusuario')->nullable();
            $table->string('instagramusuario')->nullable();
            $table->string('youtubeusuario')->nullable();
            $table->string('cor')->default('blue');
            $table->string('logo')->nullable();
            $table->string('cover')->nullable();
            $table->string('slug')->nullable();

            $table->string('subdomain')->unique();
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
        Schema::dropIfExists('sites');
    }
};
