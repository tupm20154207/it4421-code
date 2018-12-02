<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->string('email')->unique();
      $table->string('password');
      $table->rememberToken();
      $table->timestamps();
    });
//    Schema::table('users', function (Blueprint $table) {
//      $table->string('username', 255);
//      $table->string('password', 255)->change();
//      $table->dropColumn('name');
//      $table->dropTimestamps();
//      $table->string('fullname', 255);
//      $table->string('phone', 50)->unique();
//      $table->enum('role', ['customer', 'order_manager', 'restaurant_manager', 'admin']);
//    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('users');
  }
}
