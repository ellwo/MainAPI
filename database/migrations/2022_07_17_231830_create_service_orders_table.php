<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->integer('qun')->default(1);
            $table->text('note')->nullable();
            $table->text('address')->nullable();
            $table->text('land_map')->nullable();
            $table->text('long_map')->nullable();
            $table->date('to_date')->nullable();
            $table->foreignId('service_id')->nullable()->constrained('services')->cascadeOnDelete();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('service_orders');
    }
}
