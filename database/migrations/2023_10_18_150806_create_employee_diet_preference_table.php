<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDietPreferenceTable extends Migration
{
    public function up()
    {
        Schema::create('diet_preference_employee', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->foreignId('diet_preference_id')->constrained('diet_preferences');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('diet_preference_employee');
    }
}