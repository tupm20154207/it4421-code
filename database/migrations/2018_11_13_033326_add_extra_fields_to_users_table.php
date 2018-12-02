<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraFieldsToUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('users', function (Blueprint $table) {
      $table->string('username')->unique();
      $table->dropColumn('name');
      $table->dropTimestamps();
      $table->string('fullname', 255);
      $table->string('phone', 50)->unique();
      $table->enum('role', ['customer', 'order_manager', 'restaurant_manager', 'admin']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('users', function (Blueprint $table) {
      $table->dropColumn('fullname');
      $table->dropColumn('phone');
      $table->dropColumn('role');
      $table->dropColumn('username');
    });
  }
}
