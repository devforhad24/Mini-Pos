<?php

use App\Models\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $admin = [
            'name' => 'Jhon Doe',
            'email' => 'jhon@example.com',
            'password' => Hash::make(12345678),
            'phone' => 31635443653,
            'email_verified_at' => now(),
        ];

        Admin::create($admin);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
