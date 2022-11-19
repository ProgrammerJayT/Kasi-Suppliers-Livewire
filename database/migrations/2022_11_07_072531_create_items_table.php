<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'items', function (Blueprint $table) {
                $table->id();
                $table->integer('category_id');
                $table->integer('vendor_id');
                $table->string('name');
                $table->integer('quantity');
                $table->string('description');
                $table->string('image')->default('');
                $table->double('price');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};