<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifySectionOptionsTable extends Migration
{
    public function up()
    {
        Schema::table('section_options', function (Blueprint $table) {
            // Elimina los campos "maximo" y "minimo"
            $table->dropColumn('maximo');
            $table->dropColumn('minimo');

            // Agrega el campo "obligatorio"
            $table->boolean('obligatorio')->default(false);
        });
    }

    public function down()
    {
        Schema::table('section_options', function (Blueprint $table) {
            // Si alguna vez necesitas deshacer esta migración, puedes definir la operación "down" aquí.
            $table->integer('maximo')->nullable();
            $table->integer('minimo')->nullable();
            $table->dropColumn('obligatorio');
        });
    }
}

