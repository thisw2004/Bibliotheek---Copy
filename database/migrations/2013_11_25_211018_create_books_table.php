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
            $table->unsignedBigInteger('CatalogNumber'); // Auto-incrementing primary key
            $table->string('Title');
            $table->text('Description');
            $table->bigInteger('ISBN');
            $table->boolean('IsBorrowed')->default(0);
            $table->unsignedBigInteger('UserID')->nullable();
            $table->string('Author');
            //timestamps zijn misschien toch wel handig ;)
            $table->timestamps(); 
            // Foreign key constraint
            $table->foreign('UserID')->references('id')->on('users');
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
