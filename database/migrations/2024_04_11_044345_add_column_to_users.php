<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nombreUsuario');
            $table->string('apellidoUsuario');
            $table->string('tipoDocumento');
            $table->date('fechaNacimiento');
            $table->integer('edad');
            $table->string('genero');
            $table->string('telefono');
            $table->string('profesion');
            $table->string('direccion');
            $table->string('correo')->unique();
            $table->string('contrasenia');
            $table->unsignedInteger('fk_id_rol');
            $table->foreign('fk_id_rol')->references('idRol')->on('roles');
            // No necesitamos agregar created_at y updated_at aquí, Laravel los agregará automáticamente
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['fk_id_rol']);
            $table->dropColumn('idUsuario');
            $table->dropColumn('nombreUsuario');
            $table->dropColumn('apellidoUsuario');
            $table->dropColumn('tipoDocumento');
            $table->dropColumn('fechaNacimiento');
            $table->dropColumn('edad');
            $table->dropColumn('genero');
            $table->dropColumn('telefono');
            $table->dropColumn('profesion');
            $table->dropColumn('direccion');
            $table->dropColumn('correo');
            $table->dropColumn('contrasenia');
        });
    }
}
