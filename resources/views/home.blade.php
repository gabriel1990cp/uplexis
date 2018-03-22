@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form action="{{ url('cnpj') }}" method="post" name="form_cnpj" id="form_cnpj">
                        <div class="form-group col-md-12">
                            <label for="cnpj">CPNJ</label>
                            <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="Por favor digite o CNPJ no seguinte formato: XX.XXX.XXX-XXXX-XX" required>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-primary">Consultar</button>
                            <a class="btn btn-danger" href="{{ url('/') }}">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
