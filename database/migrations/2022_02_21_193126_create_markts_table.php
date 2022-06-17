<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarktsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markts', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->foreignId("city_id")->nullable()->constrained("cities")->nullOnDelete();
            $table->text("land_map")->nullable();
            $table->text("long_map")->nullable();
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
        Schema::dropIfExists('markts');
    }
}
