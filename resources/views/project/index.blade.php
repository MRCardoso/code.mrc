@extends('app')

@section('content')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Cliente</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Progresso</th>
                <th>Status</th>
                <th>Vencimento</th>
                <th>editar</th>
            </tr>
        </thead>
        <tbody>
        @foreach($output as $project)
            <tr>
                <td>{{$project->user->name}}</td>
                <td>{{$project->client->name}}</td>
                <td>
                    <a href="{{ url('/project/'.$project->id) }}">
                        {{$project->name}}
                    </a>
                </td>
                <td>{{$project->description}}</td>
                <td>
                    <span class="label label-{{$progress[$project->progress]["class"]}}">
                        {{$progress[$project->progress]["name"]}}
                    </span>
                </td>
                <td>
                    @if($project->status)
                        <span class="label label-success">
                            <span class="glyphicon glyphicon-ok-circle"></span>
                            Ativo
                        </span>
                    @else
                        <span class="label label-default">
                            <span class="glyphicon glyphicon-ban-circle"></span>
                            Inativo
                        </span>
                    @endif
                </td>
                <td>{{$project->due_date}}</td>
                <td>
                    <a href="{{ url('/project/'.$project->id.'/edit') }}">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="#" data-url="{{ url('/project/'.$project->id) }}" class="remove-link" data-toggle="modal" data-target=".modal-remove">
                        <span class="glyphicon glyphicon-remove"></span>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop