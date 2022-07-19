<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BussinseUserFollowers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bussinse_user', function (Blueprint $table) {
 //           $table->id();
            $table->foreignId("bussinse_id")->nullable()->constrained('bussinses')->nullOnDelete();
            $table->foreignId("user_id")->nullable()->constrained('users')->nullOnDelete();
            $table->integer("isblocked")->default(0);
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
        Schema::dropIfExists('bussinse_user');
    }
}
