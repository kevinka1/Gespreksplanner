<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAfsprakenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afspraken', function (Blueprint $table) {
            $table->id();
            $table->string('afspraak');
            $table->tinyInteger('status');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->string('email');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('afspraken');
    }
}
