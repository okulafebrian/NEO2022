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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->string('category_init');
            $table->longText('content')->nullable();
            $table->string('ebooklet')->nullable();
            $table->integer('early_price');
            $table->integer('early_quota');
            $table->integer('normal_price');
            $table->integer('normal_quota');
            $table->string('link_group')->nullable();
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
        Schema::dropIfExists('competitions');
    }
};