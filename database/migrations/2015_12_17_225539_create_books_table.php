<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cover', 90);
            $table->string('title', 80);
            $table->string('author', 80);
            $table->string('translator', 80);
            $table->longText('synopsis');
            $table->string('origin', 25);
            $table->integer('publishing_companies_id')->unsigned();
            $table->foreign('publishing_companies_id')->references('id')->on('publishing_companies');
            $table->string('language', 30);
            $table->string('edition', 20);
            $table->char('year', 4);
            $table->char('bar_code', 13);
            $table->char('isbn', 17);
            $table->string('binding', 30);
            $table->double('height', 5, 2);
            $table->double('width', 5, 2);
            $table->double('length', 5, 2);
            $table->double('weight', 5, 2);
            $table->integer('number_pages');
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
        Schema::drop('books');
    }
}
