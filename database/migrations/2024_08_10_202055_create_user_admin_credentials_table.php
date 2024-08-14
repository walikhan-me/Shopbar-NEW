<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_admin_credentials', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('useremail')->unique();
            $table->string('userpassword');
            $table->string('userrole');
            $table->string('usercity');
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
        Schema::dropIfExists('user_admin_credentials');
    }
};
