<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('productId')->unsigned();
            $table->bigInteger('userId')->unsigned();
            $table->bigInteger('rating');
            $table->timestamps();

            $table->foreign('productId')
                    ->references('id')
                    ->on('product')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            
            $table->foreign('userId') 
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
