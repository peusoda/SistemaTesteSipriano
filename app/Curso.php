<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'id',
        'nome', 
        'cursos',
        'atividades',
        'planejamento', 
        'cronograma', 
        'carga_horária',
        'recursos_digitais', 
        'experiencia', 
        'recursos_tecnologicos', 
        'videoaulas', 
        'livros',
        'comunicacao',
        'plano_aula',
        'sugestao'
    ];
}
