// database/migrations/2024_01_01_create_contact_messages_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('subject');
            $table->text('message');
            $table->string('status')->default('unread');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_messages');
    }
};