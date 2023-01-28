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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sub_id')->unique();
            $table->string('name');
            $table->string('mother_name')->nullable();
            $table->string('birth')->nullable();
            $table->string('address')->nullable();
            $table->string('job')->nullable();
            $table->string('book_num')->nullable();
            $table->string('history')->nullable();
            $table->string('note')->nullable();
            $table->string('book_type')->nullable();
            $table->string('disc_num')->nullable();
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
        Schema::dropIfExists('reservations');
    }
};
