<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodReceiversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_receivers', function (Blueprint $table) {
            $table->id();
            $table->string('receiver_name');
            $table->string('receiver_phone');
            $table->string('receiver_address')->nullable();
            $table->string('receiver_gender');
            $table->string('receiver_profession')->nullable();
            $table->string('receiver_hospital')->nullable();
            $table->string('receiver_donation_date');
            $table->string('receiver_blood_group');
            $table->string('blood_bag')->nullable();
            $table->integer('donor_id');
            $table->string('donor_name');
            $table->string('donor_phone')->nullable();
            $table->string('donor_email')->nullable();
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
        Schema::dropIfExists('blood_receivers');
    }
}
