<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registration_detail_id');
            $table->foreign('registration_detail_id')->references('id')->on('registration_details')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('gender');
            $table->string('grade');
            $table->unsignedBigInteger('province_id')->nullable();
            $table->foreign('province_id')->references('id')->on('provinces')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedBigInteger('district_id')->nullable();
            $table->foreign('district_id')->references('id')->on('districts')->onUpdate('cascade')->onDelete('set null');
            $table->string('address');
            $table->string('email');
            $table->string('phone_number');
            $table->string('line_id');
            $table->string('institution');
            $table->string('allergy');
            $table->string('vaccination');
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
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
