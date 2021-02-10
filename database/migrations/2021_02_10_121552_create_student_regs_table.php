<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_regs', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->integer('batch_id');
            $table->integer('section_id');
            $table->string('father_name');
            $table->string('father_mobile');
            $table->string('father_profession');
            $table->string('mother_name');
            $table->string('mother_mobile');
            $table->string('mother_profession');
            $table->string('email_address')->nullable();
            $table->string('sms_mobile');
            $table->string('date_of_admission');
            $table->date('date_of_admission');
            $table->string('student_photo')->nullable();
            $table->string('roll_no');
            $table->text('address');
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
        Schema::dropIfExists('student_regs');
    }
}
