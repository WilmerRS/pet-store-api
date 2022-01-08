<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicturesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('pictures', function (Blueprint $table) {
      $table->id();
      $table->string('label');
      $table->string('description')->nullable();
      $table->string('path');

      $table->unsignedBigInteger('pet_id');
      $table->foreign('pet_id')->references('id')->on('pets')->onDelete('cascade')->onUpdate('cascade');

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
    Schema::dropIfExists('pictures');
  }
}
