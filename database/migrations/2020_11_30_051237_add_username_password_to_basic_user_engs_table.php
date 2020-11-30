<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsernamePasswordToBasicUserEngsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('basic_user_engs', function (Blueprint $table) {
            $table->string('Username')->nullable()->after('State');
            $table->string('Password')->nullable()->after('username');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('basic_user_engs', function (Blueprint $table) {
            $table->dropColumn('Username');
            $table->dropColumn('Password');
        });
    }
}
