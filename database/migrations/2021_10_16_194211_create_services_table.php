<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->json('note')->nullable();
            $table->float('price')->default(0);
            $table->json("imgs")->nullable();
            $table->float("min_pyment")->nullable();
            $table->integer("how_long")->nullable();
            $table->text("image")->nullable();
            $table->text("owner_type")->nullable();
            $table->bigInteger("owner_id")->nullable();

            $table->foreignId('department_id')->constrained('departments');
            //$table->

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
        Schema::dropIfExists('services');
    }
}
