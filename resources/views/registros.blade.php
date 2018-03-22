@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="form-group col-md-12">
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Registros</div>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>ID Usuário</th>
                                <th>CNPJ</th>
                                <th>JSON</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($registros as $row)
                                <tr>
                                    <th scope="row">{{$row->id}}</th>
                                    <th>{{$row->id_usuario}}</th>
                                    <th>{{$row->cnpj}}</th>
                                    <th>{{utf8_decode($row->json)}}</th>
                                    <th><button class="btn btn-danger btn-xs confirma_exclusao" href="#" data-id="{{$row->id}}">Deletar</button></th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <a class="btn btn-primary" href="{{ url('/consultarCNPJ') }}" >Cadastrar</a>
            </div>
        </div>
    </div>
@endsection

<!-- MODAL -->
<div class="modal fade" id="modal_confirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirmação de Exclusão</h4>
            </div>
            <div class="modal-body">
                <p>Deseja realmente excluir o registro : <strong><span id="id"></span></strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                <button type="button" class="btn btn-danger" id="btn_excluir">Sim</button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    $(function () {
        $('.confirma_exclusao').on('click', function (e) {
            e.preventDefault();

            var id = $(this).data('id');

            $('#modal_confirmation').data('id', id);
            $('#modal_confirmation').modal('show');
        });

        $('#modal_confirmation').on('show.bs.modal', function () {
            var id = $(this).data('id');
            $('#id').text(id);
        });

        $('#btn_excluir').click(function () {
            var id = $('#modal_confirmation').data('id');

            $.ajax({
                type: 'GET',
                url: "{{ URL::route('deletar') }}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': id
                },
                success: function(data) {
                    location.reload();
                },
            });


        });
    });
    </script>
