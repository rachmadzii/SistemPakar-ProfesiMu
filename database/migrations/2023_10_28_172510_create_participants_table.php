<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Gender;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('participant_name', 100);
            $table->enum('gender', Gender::values());
            $table->integer('age');
            $table->string('study_program', 100);
            $table->string('education', 100);
            $table->string('experience', 100);
            $table->text('goal');
            $table->integer('personality_id');
            $table->integer('profession_id');
            $table->integer('star_rating')->nullable();
            $table->text('feedback')->nullable();
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
        Schema::dropIfExists('participants');
    }
};