<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Miniss extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miniss', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->foreignId('task_id')->references('id')->on('tasks');

        });
    }


    public function down()
    {
        //
    }
}
