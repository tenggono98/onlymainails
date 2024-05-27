<?php

use App\Models\User;
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
        Schema::create('t_bookings', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36);
            $table->bigInteger('deposit_price');
            $table->bigInteger('total_price');
            $table->bigInteger('total_price_after_tax');
            $table->string('code_booking');
            $table->date('date_booking');
            $table->date('time_booking');
            $table->bigInteger('reschedule_booking_original_id')->nullable();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(User::class,'created_by')->nullable();
            $table->foreignIdFor(User::class,'updated_by')->nullable();
            $table->enum('status',[true,false,'reschedule'])->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_bookings');
    }
};
