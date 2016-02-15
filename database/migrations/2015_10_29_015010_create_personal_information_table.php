<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_information', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')
                  ->references('id')
                  ->on('patients')
                  ->onDelete('restrict');

            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->date('birth_date');
            $table->string('gender');
            $table->string('civil_status');
            $table->string('house_no');
            $table->string('street');
            $table->string('barangay');
            $table->string('municipality');
            $table->string('province');
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
        Schema::drop('personal_information');
    }
}
