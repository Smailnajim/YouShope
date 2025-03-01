<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatPivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('categoris_produits');
        Schema::create('categori_produit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categori_id')->references('id')->on('categoris');
            $table->foreignId('produit_id')->references('id')->on('produits');
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
        Schema::table('categoris_produits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_categoris')->references('id')->on('categoris');
            $table->foreignId('id_produits')->references('id')->on('produits');
            $table->timestamps();
        });
        Schema::dropIfExists('categori_produit');
    }
}
