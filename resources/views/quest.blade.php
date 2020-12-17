@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" crossorigin="anonymous" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">PESQUISA DE SATISFAÇÃO DOS DOCENTES DO IFNMG COM AS ANPS</div>
                <div class="card-body">
                    @include('flash::message')
                    <div class="portlet-body table-responsive">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>Docente</th>
                                    <th>Cursos</th>
                                    <th>Atividades</th>
                                    <th>Planejamento</th>
                                    <th>Cronograma</th>
                                    <th>Carga horária</th>
                                    <th>Recursos digitais</th>
                                    <th>Experiência</th>
                                    <th>Recursos Tecnológicos</th>
                                    <th>Videoaulas</th>
                                    <th>Livros</th>
                                    <th>Comunicação</th>
                                    <th>Plano de aula</th>
                                    <th>Sugestão</th>
                                    <th>Atualizar</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="active">
                                    @foreach($cursos as $curso)
                                    <td><a href="#"></a>{{ $curso->nome }}</td>
                                    <td>{{ $curso->cursos }}</td>
                                    <td>{{ $curso->atividades }}</td>
                                    <td>{{ $curso->planejamento }}</td>
                                    <td>{{ $curso->cronograma }}</td>
                                    <td>{{ $curso->carga_horária }}</td>
                                    <td>{{ $curso->recursos_digitais }}</td>
                                    <td>{{ $curso->experiencia }}</td>
                                    <td>{{ $curso->recursos_tecnologicos }}</td>
                                    <td>{{ $curso->videoaulas }}</td>
                                    <td>{{ $curso->livros }}</td>
                                    <td>{{ $curso->comunicacao }}</td>
                                    <td>{{ $curso->plano_aula }}</td>
                                    <td>{{ $curso->sugestao }}</td>
                                    <td><a href="{{ route('form.update', $curso->id) }}" class="btn btn-info btn-sm"> Atualizar
                                        </a>&ensp;</td>
                                    <td><a class="btn btn-danger btn-sm " href="{{ route('form.delete', $curso->id) }}">
                                            Excluir </a></td>
                                </tr>
                                @endforeach
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br><br>
    <p> <strong> Sobre o planejamento, a instituição está preparada para dar suporte e oferecer o ensino remoto, preparando a equipe e adaptando o Projeto Político Pedagógico para se adequar ao ensino à distância durante a pandemia? </strong></p>
    <div class="col-md-12 container">
        <canvas id="chart" width="400" height="200"></canvas>
    </div>
    <p> <strong> Em relação ao cronograma, definiu-se dias e horários previamente para cada disciplina? </strong></p>
    <div class="col-md-12 container">
        <canvas id="chart2" width="400" height="200"></canvas>
    </div>

    <p> <strong> Sobre a contabilização de carga horária, está sendo feito o acompanhamento das atividades realizadas pelos alunos e da participação nas aulas síncronas e assíncronas? </strong></p>
    <div class="col-md-12 container">
        <canvas id="chart3" width="400" height="200"></canvas>
    </div>

    <p> <strong> Em relação aos recursos digitais, a instituição oferece plataformas digitais para realização de atividades, avaliações, disponibilização de materiais, videoaulas, canal de comunicação entre professores e alunos?</strong></p>
    <div class="col-md-12 container">
        <canvas id="chart4" width="400" height="200"></canvas>
    </div>

    @endsection
    @push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <script src="{{ asset('/js/jquery.min.js')  }}"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        var ctx = document.getElementById('chart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Concordo', 'Concordo plenamente', 'Discordo', 'Discordo plenamente'],
                datasets: [{
                    label: 'Planejamento',
                    data: [<?php
                            $c = 0;
                            $cp = 0;
                            $d = 0;
                            $dp = 0;
                            $pn = 0;

                            foreach ($cursos as $curso) {
                                if ($curso->planejamento == "Concordo") {
                                    $c++;
                                }
                                if ($curso->planejamento == "Concordo plenamente") {
                                    $cp++;
                                }
                                if ($curso->planejamento == "Discordo") {
                                    $d++;
                                }
                                if ($curso->planejamento == "Discordo plenamente") {
                                    $dp++;
                                }

                                if ($curso->planejamento == "Prefiro não opinar") {
                                    $pn++;
                                }
                            }
                            echo $c . "," . $cp . "," . $d . "," . $dp . "," . $pn;
                            ?>,


                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

       
        var ctx = document.getElementById('chart2').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Concordo', 'Concordo plenamente', 'Discordo', 'Discordo plenamente'],
                datasets: [{
                    label: 'Cronograma',
                    data: [<?php
                            $c = 0;
                            $cp = 0;
                            $d = 0;
                            $dp = 0;
                            $pn = 0;

                            foreach ($cursos as $curso) {
                                if ($curso->cronograma == "Concordo") {
                                    $c++;
                                }
                                if ($curso->cronograma == "Concordo plenamente") {
                                    $cp++;
                                }
                                if ($curso->cronograma == "Discordo") {
                                    $d++;
                                }
                                if ($curso->cronograma == "Discordo plenamente") {
                                    $dp++;
                                }

                                if ($curso->cronograma == "Prefiro não opinar") {
                                    $pn++;
                                }
                            }
                            echo $c . "," . $cp . "," . $d . "," . $dp . "," . $pn;
                            ?>,


                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });


        var ctx = document.getElementById('chart3').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Concordo', 'Concordo plenamente', 'Discordo', 'Discordo plenamente'],
                datasets: [{
                    label: 'Carga Horária',
                    data: [<?php
                            $c = 0;
                            $cp = 0;
                            $d = 0;
                            $dp = 0;
                            $pn = 0;

                            foreach ($cursos as $curso) {
                                if ($curso->carga_horária == "Concordo") {
                                    $c++;
                                }
                                if ($curso->carga_horária == "Concordo plenamente") {
                                    $cp++;
                                }
                                if ($curso->carga_horária == "Discordo") {
                                    $d++;
                                }
                                if ($curso->carga_horária == "Discordo plenamente") {
                                    $dp++;
                                }

                                if ($curso->carga_horária == "Prefiro não opinar") {
                                    $pn++;
                                }
                            }
                            echo $c . "," . $cp . "," . $d . "," . $dp . "," . $pn;
                            ?>,


                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });


        var ctx = document.getElementById('chart4').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Concordo', 'Concordo plenamente', 'Discordo', 'Discordo plenamente'],
                datasets: [{
                    label: 'Recursos Digitais',
                    data: [<?php
                            $c = 0;
                            $cp = 0;
                            $d = 0;
                            $dp = 0;
                            $pn = 0;

                            foreach ($cursos as $curso) {
                                if ($curso->recursos_digitais == "Concordo") {
                                    $c++;
                                }
                                if ($curso->recursos_digitais == "Concordo plenamente") {
                                    $cp++;
                                }
                                if ($curso->recursos_digitais == "Discordo") {
                                    $d++;
                                }
                                if ($curso->recursos_digitais == "Discordo plenamente") {
                                    $dp++;
                                }

                                if ($curso->recursos_digitais == "Prefiro não opinar") {
                                    $pn++;
                                }
                            }
                            echo $c . "," . $cp . "," . $d . "," . $dp . "," . $pn;
                            ?>,


                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

    </script>

    @endpush