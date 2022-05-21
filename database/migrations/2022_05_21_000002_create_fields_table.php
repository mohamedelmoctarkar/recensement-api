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
            $table->String("validator")->nullable();
            $table->String("initial_value")->nullable();
            $table->enum('type', ['string', ' number', 'select', 'json'])->nullable();
            $table->String("unite")->nullable();

            $table->unsignedBigInteger('form_id');
            $table->foreign('form_id')->references('id')->on('forms');

            $table->unsignedBigInteger('added_for')->nullable();
            $table->foreign('added_for')->references('id')->on('fields');
            $table->unsignedBigInteger('groupe_id')->nullable();
            $table->foreign('groupe_id')->references('id')->on('groupes');

            $table->unsignedBigInteger('sous_groupe_id')->nullable();
            $table->foreign('sous_groupe_id')->references('id')->on('sous_groupes');

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
