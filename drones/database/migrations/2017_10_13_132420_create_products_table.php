<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('description_id')->unsigned();
            $table->integer('carrier_id')->nullable();
            $table->timestamps();

            $table->foreign('description_id')->references('id')->on('product_descriptions');
            $table->foreign('carrier_id')->references('id')->on('carriers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_description_id_foreign');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_carrier_id_foreign');
        });

        Schema::dropIfExists('products');
    }
}
