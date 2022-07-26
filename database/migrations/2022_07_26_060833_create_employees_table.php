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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('npwp')->unique();
            $table->string('ktp')->unique();
            $table->string('ktp_address');
            $table->string('city');
            $table->string('address');
            $table->string('phone');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->enum('gender', ['Pria', 'Wanita'])->nullable();
            $table->enum('blood_group', ['A', 'B', 'AB', 'O'])->nullable();
            $table->string('religion')->nullable();
            $table->enum('marital_status', ['Belum Menikah', 'Menikah', 'Duda / Janda'])->nullable();
            $table->string('email_recovery')->nullable();
            $table->unsignedBigInteger('user_id')->unique();
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('superior_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('superior_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
