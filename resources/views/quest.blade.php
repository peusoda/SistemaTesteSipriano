@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" crossorigin="anonymous" />
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
                                   <td><a class="btn btn-danger btn-sm "
                                       href="{{ route('form.delete', $curso->id) }}">
                                       Excluir </a></td>
                               </tr> 
                            @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script src="{{ asset('/js/jquery.min.js')  }}"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#table').DataTable({
            "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sFirst": "Primeiro",
                    "sPrevious": "Anterior",
                    "sNext": "Seguinte",
                    "sLast": "Último"
                }
            }

        });
    } );
    //Função para mostrar alert ao clickar no botão deletar.
    $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Quer mesmo excluir esse aluno?',
                text: 'O aluno será excluído permanentemente.',
                icon: 'warning',
                buttons: ["Não", "Sim"],
            }).then(function (value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
</script>

@endpush