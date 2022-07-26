<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->string('bon')->nullable();
            $table->date('date')->nullable();
            $table->string('vendeur')->nullable();
            $table->string('client')->nullable();
            $table->string('payment')->nullable();
            $table->json('avance')->nullable();
            $table->string('reste')->nullable();
            $table->text('observation')->nullable();
            $table->json('produit')->nullable();
            $table->string('numerotc')->nullable();
            $table->date('datetc')->nullable();
            $table->integer('total')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('ventes');
    }
}
