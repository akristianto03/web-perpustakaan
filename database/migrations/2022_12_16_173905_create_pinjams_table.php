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
        Schema::create('pinjams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('bookId');
            $table->string('status');
            $table->date('tglKembali');
            $table->timestamps();

            // membuat foreign key ke tabel buku dan tabel user

            $table->foreign('bookId')
            ->references('id')
            ->on('books')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('userId')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjams');
    }
};
