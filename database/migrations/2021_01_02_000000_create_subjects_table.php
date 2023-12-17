<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    public function up()
{
    Schema::create('subjects', function (Blueprint $table) {
        $table->id('SubjectID');
        $table->string('SubjectName', 255);
        $table->text('Description');
        $table->string('PlaylistLink', 255);
        $table->unsignedBigInteger('UserID')->default(1);
        $table->foreign('UserID')->references('UserID')->on('users');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('subjects');
}
}

