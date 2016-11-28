<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatsTable extends Migration
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
         */
        Schema::Create('cats', function (Blueprint $table)
        {
            $table->increments('id')->unsigned()->index();
            $table->string('title');
            $table->text('description');
            $table->integer('user_id')->unsigned()->index();
            $table->string('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cats');
    }
}
