<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUitleningenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uitleningen', function (Blueprint $table) {
            $table->id('ID'); // Primary key
            $table->unsignedBigInteger('UserID'); // Foreign key for users
            $table->unsignedBigInteger('BookID'); // Foreign key for books
            $table->dateTime('DatumUitgeleend'); // Borrow date
            $table->dateTime('DatumIngeleverd'); // Return date
            $table->timestamps(); // Created_at and Updated_at

            // Foreign key constraints
            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('BookID')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uitleningen');
    }
}
