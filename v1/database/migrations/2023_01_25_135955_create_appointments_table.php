<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->integer('doctor_id')->length(11);
            $table->integer('user_id')->length(11);
            $table->string('patient_name');
            $table->string('email');
            $table->string('mobile');
            $table->string('gender');
            $table->string('appointment_time')->nullable();
            $table->string('appointment_date')->nullable;
            $table->text('prescription');
            $table->string('doctor_name');
            $table->string('department');
            $table->string('payment_status');
            $table->string('razorpay_payment_id');
            $table->string('status');
            $table->string('amount');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
};
