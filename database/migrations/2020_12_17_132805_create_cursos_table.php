<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 150);
            $table->string('cursos', 150);
            $table->string('atividades', 50);
            $table->string('planejamento', 50);
            $table->string('cronograma', 50);
            $table->string('carga_horária', 50);
            $table->string('recursos_digitais', 50);
            $table->string('experiencia', 50);
            $table->string('recursos_tecnologicos', 50);
            $table->string('videoaulas', 50);
            $table->string('livros', 50);
            $table->string('comunicacao', 50);
            $table->string('plano_aula', 50);
            $table->string('sugestao', 500)->nullable($value = true);
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
        Schema::dropIfExists('cursos');
    }
}
