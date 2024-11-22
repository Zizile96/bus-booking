<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            // Example: Changing price to a different type
            $table->decimal('price', 10, 2)->change(); // Use change if modifying
        });
    }

    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            // Revert changes if needed
            // $table->integer('price')->change(); // Example of reverting
        });
    }
};
