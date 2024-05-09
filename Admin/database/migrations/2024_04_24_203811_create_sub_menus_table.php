<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sub_menus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('menu_id');
            $table->bigInteger('menu_category_id')->nullable();
            $table->string('sub_menu_title');
            $table->string('sub_menu_status')->default(0);
            $table->string('sub_menu_position')->nullable();
            $table->string('sub_menu_route');
            $table->string('sub_menu_slug');
            $table->foreign('menu_id')->references('id')->on('menu_items');
            $table->foreign('menu_category_id')->references('id')->on('menu_categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_menus');
    }
};
