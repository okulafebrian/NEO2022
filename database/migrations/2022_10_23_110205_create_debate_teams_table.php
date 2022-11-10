<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('debate_teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registration_detail_id');
            $table->foreign('registration_detail_id')->references('id')->on('registration_details')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
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
        Schema::dropIfExists('debate_teams');
    }
};
