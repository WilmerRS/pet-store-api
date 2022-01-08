<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('pets', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('slug')->unique();
      $table->text('description')->nullable();
      $table->dateTime('deleted_at')->nullable();
      $table->boolean('is_active')->default(1);

      $table->unsignedBigInteger('status_id');
      $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade')->onUpdate('cascade');;

      $table->unsignedBigInteger('category_id');
      $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');;

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
    Schema::dropIfExists('pets');
  }
}
