<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 191);
            $table->text('description');
            $table->date('release_date');
            $table->integer('ticket_price');
            $table->enum('rating', ['1','2','3','4','5']);
            $table->string('country', 191);
            $table->enum('genre', ['Magic','Horror','Action']);
            $table->string('photo', 191);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('films');
    }
}
