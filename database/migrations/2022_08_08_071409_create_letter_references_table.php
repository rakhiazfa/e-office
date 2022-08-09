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
        Schema::create('letter_references', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('letter_id');
            $table->string('label')->nullable();
            $table->string('file')->nullable();
            $table->string('reference_route')->nullable();
            $table->unsignedBigInteger('reference_id')->nullable();
            $table->timestamps();

            $table->foreign('letter_id')->references('id')->on('letters')->cascadeOnDelete();
            $table->foreign('reference_id')->references('id')->on('letters')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('letter_references');
    }
};
