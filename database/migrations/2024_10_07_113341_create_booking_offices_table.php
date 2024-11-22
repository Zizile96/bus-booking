<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingOfficesTable extends Migration
{
    public function up()
    {
        Schema::create('booking_offices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('province');
            $table->string('address');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('booking_offices');
    }
}