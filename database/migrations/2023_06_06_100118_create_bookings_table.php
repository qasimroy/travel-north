<?php

use App\Models\Booking;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('service_provider_id')->nullable();
            $table->unsignedInteger('service_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('origin');
            $table->string('destination')->nullable();
            $table->integer('person');
            $table->string('hotel')->nullable();
            $table->string('coach')->nullable();
            $table->string('shuttle')->nullable();
            $table->integer('price')->nullable();
            $table->enum('status', [Booking::ACCEPTED, Booking::REJECTED, Booking::COMPLETED, Booking::PENDING]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
