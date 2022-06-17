<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PartBussinseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bussinse_part', function (Blueprint $table) {
            $table->foreignId('part_id')->constrained();
            $table->foreignId('bussinse_id')->constrained();
            $table->timestamps();

            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {    Schema::dropIfExists('bussinse_part');

    }
}
