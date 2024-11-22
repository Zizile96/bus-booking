<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
{
    Schema::create('tickets', function (Blueprint $table) {
        $table->id();  // Automatically creates an 'id' field
        $table->string('from');
        $table->string('to');
        $table->date('date');
        $table->string('trip_type');
        $table->decimal('price', 8, 2);
        $table->string('payment_method');
        $table->foreignId('user_id')->constrained(); // Assuming a 'user_id' foreign key
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}