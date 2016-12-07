<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
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
         * A category is expected to have a title, description and a slug.
         * Also timestamps for analysis by date.
         */
        Schema::Create('categories', function (Blueprint $table)
        {
            $table->increments('id')->unsigned()->index();
            $table->string('title');
            $table->text('description');
            $table->string('slug');
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
        Schema::dropIfExists('categories');
    }
}
