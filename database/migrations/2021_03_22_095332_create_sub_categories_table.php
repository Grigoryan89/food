<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_id')->unsigned();
            $table->unsignedBigInteger('sub_id')->unsigned();
            $table->timestamps();

            $table->foreign('cat_id')->
            references('id')->
            on('categories')->
            onDelete('cascade')->
            onUpdate('cascade');
            $table->foreign('sub_id')->
            references('id')->
            on('categories')->
            onDelete('cascade')->
            onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_categories');
    }
}
