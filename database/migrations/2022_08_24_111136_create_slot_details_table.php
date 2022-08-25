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
        Schema::create('slot_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('slot_id');
            $table->foreign('slot_id')->references('id')->on('slots')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('participant_id');
            $table->foreign('participant_id')->references('id')->on('participants')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('slot_details');
    }
};
