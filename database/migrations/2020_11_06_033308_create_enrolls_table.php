<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enrollment_officer_id')->constrained('users');
            $table->foreignId('student_id')->constrained();
            $table->foreignId('acad_year_id')->constrained();
            $table->foreignId('section_id')->constrained();
            $table->foreignId('student_remark_id')->nullable()->constrained();
            $table->integer('semester')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrolls');
    }
}
