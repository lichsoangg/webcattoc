<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLichcatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lichcats', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('combo_id');
            $table->string('gia_id');
            $table->date('ngaycat');
            $table->time('giocat');
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
        Schema::dropIfExists('lichcats');
    }
}
