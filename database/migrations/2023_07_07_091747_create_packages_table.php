<?php

use App\Models\Package;
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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_provider_id');
            $table->unsignedBigInteger('service_id');
            $table->date('start_date')->format('Y-m-d');
            $table->date('end_date')->format('Y-m-d');
            $table->integer('days');
            $table->string('origin');
            $table->string('destination')->nullable();
            $table->string('hotel')->nullable();
            $table->string('coach')->nullable();
            $table->string('shuttle')->nullable();
            $table->integer('price');
            $table->integer('seat');
            $table->unsignedInteger('persons_booked')->default(0)->nullable();
            $table->string('image')->nullable();
            $table->enum('status', [Package::OPEN, Package::CLOSED]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
