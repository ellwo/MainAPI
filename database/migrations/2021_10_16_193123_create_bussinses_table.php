<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBussinsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bussinses', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('username')->unique()->nullable();
            $table->text('note')->nullable();
            $table->json('address')->nullable();
            $table->json("contact_links")->nullable();
            $table->json("phone_numbers")->nullable();
            $table->text("avatar")->nullable();
            $table->json("imgs")->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('department_id')->nullable()->constrained('departments')->nullOnDelete();
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
        Schema::dropIfExists('bussinses');
    }
}
