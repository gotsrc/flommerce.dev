<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('cart', function (Blueprint $table) {
             $table->string('id');
             $table->string('instance');
             $table->longText('content');
             $table->nullableTimestamps();
             $table->integer('product_id');
             $table->primary(['id', 'instance']);
         });
     }
     /**
      * Reverse the migrations.
      */
     public function down()
     {
         Schema::dropIfExists('cart');
     }
 }
