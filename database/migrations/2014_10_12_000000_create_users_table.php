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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('idOfficeOriginFK')->default(0); // You can change the default value as needed.
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('user_image')->nullable();
            $table->rememberToken();
            $table->timestamps();


            // Creating an index on 'idOfficeOriginFK'
            $table->index('idOfficeOriginFK', 'officeOrigin1'); // This creates a BTREE index named 'officeOrigin1'.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
