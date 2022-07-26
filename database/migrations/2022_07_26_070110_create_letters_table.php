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
        Schema::create('letters', function (Blueprint $table) {
            $table->id();

            $table->string('letter_number')->nullable();
            $table->string('regarding')->nullable();
            $table->string('attachment')->nullable();

            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('type_id')->nullable();

            $table->string('sender_name')->nullable();
            $table->unsignedBigInteger('sender_id')->nullable();

            $table->unsignedBigInteger('copy_id')->nullable();
            $table->unsignedBigInteger('destination_id')->nullable();

            $table->date('date_of_letter');
            $table->date('date_of_entry')->nullable();

            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('recipient_name')->nullable();
            $table->unsignedBigInteger('first_checker_id')->nullable();
            $table->unsignedBigInteger('second_checker_id')->nullable();

            $table->string('note_title')->nullable();
            $table->unsignedBigInteger('meeting_id')->nullable();
            $table->text('message')->nullable();
            $table->enum('status', ['Draft', 'Completed'])->nullable();

            $table->timestamps();


            $table->foreign('category_id')->references('id')->on('letter_categories');
            $table->foreign('type_id')->references('id')->on('letter_types');

            $table->foreign('sender_id')->references('id')->on('employees');
            $table->foreign('copy_id')->references('id')->on('employees');
            $table->foreign('destination_id')->references('id')->on('employees');

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('first_checker_id')->references('id')->on('employees');
            $table->foreign('second_checker_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('letters');
    }
};