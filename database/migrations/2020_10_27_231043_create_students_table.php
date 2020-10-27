<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_remark_id')->nullable()->constrained();
            $table->string('lrn', 12);
            $table->string('first_name', 45);
            $table->string('middle_name', 45)->nullable();
            $table->string('last_name', 45);
            $table->string('suffix', 10)->nullable();
            $table->char('sex', 1);
            $table->date('birthdate');
            $table->string('mother_tongue', 45);
            $table->string('contact_number', 11);
            $table->string('previous_school', 100);
            $table->string('ethnic', 45);
            $table->string('religion', 45);
            $table->string('purok', 45);
            $table->string('barangay', 45);
            $table->string('city', 45);
            $table->string('province', 45);
            $table->string('username', 25);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['LRN', 'username', 'deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
