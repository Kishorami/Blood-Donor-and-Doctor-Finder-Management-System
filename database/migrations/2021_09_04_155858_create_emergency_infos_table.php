<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmergencyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency_infos', function (Blueprint $table) {
            $table->id();
            $table->text('ambulance_d');
            $table->string('ambulance_n');
            $table->text('blood_bank_d');
            $table->string('blood_bank_n');
            $table->text('social_d');
            $table->string('social_n');
            $table->text('graveyard_d');
            $table->string('graveyard_n');
            $table->text('funeral_d');
            $table->string('funeral_n');
            $table->text('therapy_d');
            $table->string('therapy_n');            
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
        Schema::dropIfExists('emergency_infos');
    }
}
