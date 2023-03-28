<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSelectedcoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selectedcourses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->default('');
            $table->integer('credit')->default(0); // 新增學分數欄位
            $table->string('teacher')->default(''); // 新增老師名稱欄位
            $table->string('class_code')->default(''); // 新增課堂編號欄位
            $table->string('course_id'); // 新增課堂編號欄位
            $table->unsignedBigInteger('user_id')->default(null);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('selectedcourses');

    }
}
