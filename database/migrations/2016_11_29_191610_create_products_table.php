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
        /*
         * Populate the Database with the following schema.
         * A product is expected to have a title, category_id, description, list price,
         * whether the item is in the sales or not, slug, time created, time updated.
         */
        Schema::Create('products', function (Blueprint $table)
        {
            $table->increments('id')->unsigned()->index();
            $table->integer('category_id')->index();
            $table->string('title')->unique();
            $table->text('description');
            $table->string('img_path');
            $table->decimal('price', 10, 2);
            $table->boolean('sale')->default('0');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('products');
    }
}
