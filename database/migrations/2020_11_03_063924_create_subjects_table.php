<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('description');
            $table->integer('unit');
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['code', 'deleted_at']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
