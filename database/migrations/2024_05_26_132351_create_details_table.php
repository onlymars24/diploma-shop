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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->string('detail_brand');
            $table->string('number');
            $table->text('descr');
            $table->double('price');
            $table->string('image')->default('');
            $table->integer('count');
            $table->integer('brand_id');
            $table->integer('design_id');
            $table->integer('generation_id');
            $table->integer('modification_id');
            $table->integer('type_id');
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
        Schema::dropIfExists('details');
    }
};
