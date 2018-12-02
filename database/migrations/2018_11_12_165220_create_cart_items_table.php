<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartItemsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('cart_items', function (Blueprint $table) {
      $table->unsignedInteger('order_id');
      $table->unsignedInteger('product_id');
      $table->unsignedInteger('quantity');
      $table->string('description', 1000);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('cart_items');
  }
}
