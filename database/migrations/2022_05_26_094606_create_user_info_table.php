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
        Schema::create('user_info', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class);
            $table->string('name')->nullable();
            $table->string('from', 100)->nullable();
            $table->string('to', 100)->nullable();
            $table->string('long', 100)->nullable();
            $table->json('interestings')->nullable();
            $table->json('hobbies')->nullable();
            $table->text('about')->nullable();
            $table->json('socials')->nullable();
            $table->string('img')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
};
