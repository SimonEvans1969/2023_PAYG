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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('club_id')->references('id')->on('clubs');
            $table->string('code');
            $table->string('name');
            $table->text('description');
            $table->bigInteger('type');
            $table->bigInteger('period');
            $table->integer('booking_how');
            $table->integer('booking_by');
            $table->integer('visibility');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('capacity')->nullable();
            $table->integer('status');
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
