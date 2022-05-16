<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXacminhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xacminhs', function (Blueprint $table) {
            $table->id();
            $table->string('tenkhachang');
            $table->string('emailkhachhang');
            $table->string('combo_id');
            $table->string('gia_id');
            $table->date('ngaycat');
            $table->time('giocat');
            $table->integer('trangthai');
            $table->string('tennhanvien');
            $table->string('phonekhachhang');
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
        Schema::dropIfExists('xacminhs');
    }
}
