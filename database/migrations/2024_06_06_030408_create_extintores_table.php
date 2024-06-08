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
        Schema::create('extintores', function (Blueprint $table) {
            $table->integer('id', true, true)->primary;
            $table->integer('capacidad', false, true);
            $table->date('fechafabricacion');
            $table->string('estado', 50);
            $table->integer('idtipo', false, true);
            $table->foreign('idtipo')->references('id')->on('tipos');
            $table->integer('idubicacion', false, true);
            $table->foreign('idubicacion')->references('id')->on('ubicaciones');
            $table->integer('idproveedor', false, true);
            $table->foreign('idproveedor')->references('id')->on('proveedores');
            $table->timestamps();
        });

        /* 
        id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        capacidad INT UNSIGNED,
        fechafabricacion DATE,
        estado VARCHAR(50),
        idtipo INT UNSIGNED,
        idubicacion INT UNSIGNED,
        idproveedor INT UNSIGNED,
        FOREIGN KEY (idtipo) REFERENCES tipos(id),
        FOREIGN KEY (idubicacion) REFERENCES ubicaciones(id),
        FOREIGN KEY (idproveedor) REFERENCES proveedores(id)
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extintores');
    }
};
