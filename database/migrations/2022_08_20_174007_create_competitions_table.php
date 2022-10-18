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
            $table->integer('price');
            $table->integer('quota');
            $table->integer('promo_price')->nullable();
            $table->integer('promo_quota')->nullable();
            $table->string('logo')->nullable();
            $table->string('link_group')->nullable();
            $table->string('ebooklet')->nullable();
            $table->longText('content')->nullable();
            $table->unsignedBigInteger('promotion_id')->nullable();
            $table->foreign('promotion_id')->references('id')->on('promotions')->onUpdate('cascade')->onDelete(null);
            $table->boolean('is_active');
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
