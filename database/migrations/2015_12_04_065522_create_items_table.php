<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');

            $table->integer('category_id')->nullable()->unsigned();
            $table->foreign('category_id')
                  ->references('id')
                  ->on('item_categories')
                  ->onDelete('restrict');

            $table->string('description');

            $table->integer('uom_id')->nullable()->unsigned();
            $table->foreign('uom_id')
                  ->references('id')
                  ->on('item_uoms')
                  ->onDelete('restrict');
                  
            $table->string('reorder_point');
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
        Schema::drop('items');
    }
}


/*$item = App\Item::create([
                'code' => 'it-002',
                'name' => 'cdr',
                'category' => 'it',
                'description' => 'cdr',
                'uom' => 'piece',
                'reorder_point' => '100'
                ]);*/