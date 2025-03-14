<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->string('addres')->unique();
            $table->timestamps();
        });
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('addres_id')->references('id')->on('address')->onDelete('cascade');
            $table->float('prix_order');
            $table->integer('number_items');
            $table->string('status')->default('En Cour');
            $table->timestamps();
        });
        Schema::create('order_produit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreignId('produit_id')->references('id')->on('produits')->onDelete('cascade');
            $table->float('prix_total_produit');
            $table->integer('number_items_produit');
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
        Schema::dropIfExists('address');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_Produit');
    }
}
