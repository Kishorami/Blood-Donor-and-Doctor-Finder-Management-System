<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTheraphycenterinfoTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theraphycenterinfo_tables', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('division');
            $table->string('district');
            $table->string('upazila');
            $table->string('location');
            $table->string('phone');
            $table->string('photo')->nullable();
            $table->string('details')->nullable();
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
        Schema::dropIfExists('theraphycenterinfo_tables');
    }
}
