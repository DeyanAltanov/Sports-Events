<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('home_team');
            $table->string('away_team');
            $table->date('match_date');
            $table->time('match_time');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}