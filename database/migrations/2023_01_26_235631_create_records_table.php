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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sub_id')->unique();
            $table->integer('number');
            $table->string('history');
            $table->string('year');
            $table->string('skin');
            $table->string('owner_name');
            $table->string('block_number')->nullable();
            $table->string('district_name')->nullable();
            $table->string('sex')->nullable();
            $table->string('transaction_type')->nullable();
            $table->string('meter')->nullable();
            $table->string('olc')->nullable();
            $table->string('dunum')->nullable();
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
        Schema::dropIfExists('records');
    }
};
