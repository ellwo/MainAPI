<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->text("address")->nullable();
            $table->json("phone")->nullable();
            $table->foreignId("bussinse_id")->nullable()->constrained("bussinses")->cascadeOnDelete();
            $table->foreignId("markt_id")->nullable()->constrained("markts")->cascadeOnDelete();
            $table->text("land_map");
            $table->text("long_map");
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
        Schema::dropIfExists('locations');
    }
}
