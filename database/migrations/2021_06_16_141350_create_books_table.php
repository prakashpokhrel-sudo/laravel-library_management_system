<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->nullable();
            $table->string('author')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('price')->nullable();
            $table->integer('code_no')->nullable();
            $table->string('coverphoto')->nullable();
            $table->integer('bookcategory_id')->nullable();
            $table->integer('isbn_no')->nullable();
            $table->integer('rack_id')->nullable();
            $table->integer('edition_no')->nullable();
            $table->dateTime('edition_date')->nullable();
            $table->string('publisher')->nullable();
            $table->dateTime('published_date')->nullable();
            $table->text('notes')->nullable();
             $table->string('book_status');
            $table->integer('added_by')->unsigned();
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
        Schema::dropIfExists('books');
    }
}
