<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->string('PositionDepartment');
            $table->string('CityTineState');
            $table->string('PersonalNumber')->unique();
            $table->string('NationalNumber')->unique();
            $table->string('CurrentOffice');
            $table->integer('MoneyLeft');
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
        Schema::dropIfExists('basic_users');
    }
}
