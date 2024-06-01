<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('id_number');
            $table->integer('phone_number');
            $table->string('traveller_id')->unique()->nullable();
            $table->foreignId('trip_id')->constrained();
            $table->foreignId('flight_id')->nullable()->constrained();

        });
        
        // DB::table('customers')->insert([
        //     'name' => 'Mohamed Suhail',
        //     'id_number' => 'A249836',
        //     'phone_number' => '7999065',
        //     'trip_id' => 1,
        //     'flight_id' => null,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
