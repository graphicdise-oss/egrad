<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pdf_card_settings', function (Blueprint $table) {
            $table->id();
            $table->string('degree', 20); // master, doctor, teacher
            $table->unsignedTinyInteger('term'); // 1 หรือ 2
            $table->unsignedSmallInteger('year'); // ปีการศึกษา (พ.ศ.)
            $table->string('exam_announce_text')->nullable();
            $table->string('exam_date_text')->nullable();
            $table->string('admit_announce_text')->nullable();
            $table->string('semester_start_text')->nullable();
            $table->timestamps();

            $table->unique(['degree', 'term', 'year']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pdf_card_settings');
    }
};
