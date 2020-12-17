@extends('layouts.app')
@push('style')
    <style>
    h11 {
    color:red;
    }
    #logo {
      width:50%;
      height:50%;
    }
    .panel-heading{
      font-size:150%;
    }
    #img {
      padding: 10px;
      margin: 20px;
      width: 150px;
    }
    </style>
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ATUALIZAR DADOS DA RESPOSTA</div>
                <div class="card-body">
                  <div class="portlet-body table-responsive">
                  {{ Form::model($curso, ['route' => 'form.updateConfirm', 'method' => 'PUT', 'files' => true, 'enctype' => 'multipart/form-data']) }}  
                    <table class="table" id="table">
                        <fieldset>
                          <input type="hidden" value="{{ $curso->id }}" name="id">  
                            <!-- Text input-->
                            <div class="form-group">
                              {{ Form::label('nome', 'Nome', array('class' => 'col-md-2 control-label required')) }}
                              <div class="col-md-8 ">
                              {{ Form::text('nome', 'old'('nome'), ['class' => 'form-control input-md', 'required']) }}
                              </div>
                         
                              <div class="form-group">
                              {{ Form::label('cursos', 'Cursos', array('class' => 'col-md-5 control-label')) }}
                              <div class="col-md-12">
                              {{ Form::text('cursos', 'old'('cursos'), ['class' => 'form-control input-md']) }}
                              </div>
                              </div>

                              <div class="form-group">
                              {{ Form::label('sugestao', 'Sugestões', array('class' => 'col-md-5 control-label')) }}
                              <div class="col-md-12">
                              {{ Form::text('sugestao', 'old'('sugestao'), ['class' => 'form-control input-md']) }}
                              </div>
                              </div>
                            </div>

                        </fieldset>
                     
                    </table>
                    <div class="col-md-12">
                      {{ Form::submit('Atualizar dados', ['class' => 'btn btn-success btn-block btn-lg']) }}
                    </div>
                    {{ Form::close() }}
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!------ Include the above in your HEAD tag ---------->
@endsection

@push('js')
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
@endpush    



