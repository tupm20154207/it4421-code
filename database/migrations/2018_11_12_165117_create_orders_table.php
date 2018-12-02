<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateOrdersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('orders', function (Blueprint $table) {
      $table->increments('id');
      $table->timestamps();
      $table->string('receiver', 255);
      $table->string('phonenumber', 255);
      $table->string('delivery_address', 255);
      $table->timestamp('delivery_time')->default(DB::raw('CURRENT_TIMESTAMP'));
      $table->enum('state', ['pending', 'delivering', 'cancelled', 'finished']);
      $table->string('note', 255);
      $table->unsignedInteger('user_id');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('orders');
  }
}
