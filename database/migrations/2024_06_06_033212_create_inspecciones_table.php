<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inspecciones', function (Blueprint $table) {
            $table->integer('id', true, true)->primary;
            $table->integer('idextintor', false, true);
            $table->foreign('idextintor')->references('id')->on('extintores');
            $table->date('fecha');
            $table->date('proximainspeccion');
            $table->timestamps();
        });

        /* 
        id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        idextintor INT UNSIGNED,
        fecha DATE,
        proximainspeccion DATE,
        FOREIGN KEY (idextintor) REFERENCES extintores(id)
         */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspecciones');
    }
};
