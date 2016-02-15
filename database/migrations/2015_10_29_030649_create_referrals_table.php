<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referrals', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('urgent');
            $table->string('reason');
            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')
                  ->references('id')
                  ->on('patients')
                  ->onDelete('cascade');

            $table->string('chief_complaint');
            $table->string('history');
            $table->string('exams_performed');
            $table->string('treatment_medication');
            $table->string('operation_performed');
            $table->string('diagnosis');
            $table->string('remarks');
            $table->softDeletes();
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
        Schema::drop('referrals');
    }
}
