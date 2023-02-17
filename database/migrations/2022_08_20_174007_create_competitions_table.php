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
            $table->integer('normal_price');
            $table->integer('total_quota');
            $table->integer('early_price')->nullable();
            $table->integer('early_quota')->nullable();
            $table->string('logo')->nullable();
            $table->string('link_group')->nullable();
            $table->string('ebooklet')->nullable();
            $table->longText('description')->nullable();
            $table->longText('rules')->nullable();
            $table->boolean('is_active')->default(1);
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
