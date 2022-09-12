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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registration_detail_id');
            $table->foreign('registration_detail_id')->references('id')->on('registration_details')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('competition');
            $table->string('gender');
            $table->string('grade');
            $table->string('address');
            $table->string('email');
            $table->string('whatsapp_number');
            $table->string('line_id')->nullable();
            $table->string('institute_name');
            $table->string('institute_address');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
};
