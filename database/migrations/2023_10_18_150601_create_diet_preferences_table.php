<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietPreferencesTable extends Migration
{
    public function up()
    {
        Schema::create('diet_preferences', function (Blueprint $table) {
            $table->id();
            $table->string('preference');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('diet_preferences');
    }
}