<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('admin_user_id') // Foreign key to users table
            ->constrained('users')
                ->onDelete('cascade'); // Cascade delete if the associated user is deleted
            $table->string('room_name'); // Name of the room
            $table->boolean('is_active')->default(true); // Active status of the room
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
