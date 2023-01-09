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
        Schema::create('res_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('club_id')->references('id')->on('clubs');
            $table->bigInteger('resource_id');
            $table->bigInteger('event_id')->nullable();
            $table->bigInteger('session_id')->nullable();
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
        Schema::dropIfExists('res_assignments');
    }
};
