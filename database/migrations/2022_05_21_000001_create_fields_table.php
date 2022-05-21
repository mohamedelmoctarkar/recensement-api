<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->String("label");
            $table->String("validator");
            $table->String("initial_value");
            $table->String("type");
            $table->enum('status', ['string', ' number', 'select']);

            $table->unsignedBigInteger('form_id');
            $table->foreign('form_id')->references('id')->on('forms');

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
        Schema::dropIfExists('fields');
    }
}
