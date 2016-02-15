<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserReferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_referrals', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('referral_id')->unsigned();
            $table->foreign('referral_id')
                  ->references('id')
                  ->on('referrals')
                  ->onDelete('restrict');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('restrict');
            $table->integer('sender_id')->unsigned();
            $table->foreign('sender_id')
                  ->references('id')
                  ->on('hospitals')
                  ->onDelete('restrict');

            $table->integer('placeholder_id')->unsigned();
            $table->foreign('placeholder_id')
                  ->references('id')
                  ->on('placeholders')
                  ->onDelete('restrict');

            $table->boolean('is_read');
            $table->boolean('is_important');

            $table->integer('is_read_by')->unsigned()->nullable();
            $table->foreign('is_read_by')
                  ->references('id')
                  ->on('users')
                  ->onDelete('restrict');

            $table->integer('received_by')->unsigned()->nullable();
            $table->foreign('received_by')
                  ->references('id')
                  ->on('users')
                  ->onDelete('restrict');

            $table->integer('receiver_id')->unsigned();
            $table->foreign('receiver_id')
                  ->references('id')
                  ->on('hospitals')
                  ->onDelete('restrict');

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
        Schema::drop('user_referrals');
    }
}
