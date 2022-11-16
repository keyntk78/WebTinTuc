<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tintuc', function (Blueprint $table) {
            $table->id();
            $table->string('tieude');
            $table->string('tieudekhongdau');
            $table->text('tomtat')->nullable();
            $table->text('noidung')->nullable();
            $table->text('hinh')->nullable();
            $table->integer('noibat')->nullable();
            $table->integer('soluotxem')->nullable();
            $table->unsignedBigInteger('id_loaitin');
            $table->unsignedBigInteger('id_user');


            $table->timestamps();
            $table->foreign('id_loaitin')->references('id')->on('loaitin')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tintuc');
    }
};