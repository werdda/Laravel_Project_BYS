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
        Schema::create('subscribe_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('total_amount');
            $table->date('subscription_start_date')->nullable();
            $table->string('proof');
            $table->boolean('is_active');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->softDeletes();//delted_at
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
        Schema::dropIfExists('subscribe_transactions');
    }
};
