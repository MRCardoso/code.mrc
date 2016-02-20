@extends('app')

@section('content')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Responsável</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>endereço</th>
                <th>Observação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($output as $client)
            <tr>
                <td>{{$client->id}}</td>
                <td>
                    <a href="{{ url('/client/'.$client->id) }}">
                        {{$client->name}}
                    </a>
                </td>
                <td>{{$client->responsible}}</td>
                <td>{{$client->email}}</td>
                <td>{{$client->phone}}</td>
                <td>{{$client->address}}</td>
                <td>{{$client->observation}}</td>
                <td>
                    <a href="{{ url('/client/'.$client->id.'/edit') }}">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="#" data-url="{{ url('/client/'.$client->id) }}" class="remove-link" data-toggle="modal" data-target=".modal-remove">
                        <span class="glyphicon glyphicon-remove"></span>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop