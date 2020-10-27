<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_remarks', function (Blueprint $table) {
            $table->id();
            $table->string('code', 8);
            $table->string('indicator', 45);
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['code', 'deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_remarks');
    }
}
