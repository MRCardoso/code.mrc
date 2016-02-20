@extends('app')

@section('content')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($output as $user)
            <tr>
                <td>
                    <a href="{{ url('/user/'.$user->id) }}">
                        {{$user->name}}
                    </a>
                </td>
                <td>{{$user->email}}</td>
                <td>
                    <a href="{{ url('/user/'.$user->id.'/edit') }}">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="#" data-url="{{ url('/user/'.$user->id) }}" class="remove-link" data-toggle="modal" data-target=".modal-remove">
                        <span class="glyphicon glyphicon-remove"></span>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop