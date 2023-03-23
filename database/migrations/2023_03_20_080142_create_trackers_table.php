<?php

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
        Schema::create('trackers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('location');
            $table->string('device_info');
            $table->string('call_logs');
            $table->string('sms_logs');
            $table->string('list_contact');
            $table->string('apps_downloaded');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trackers');
    }
};
