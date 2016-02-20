@extends('app')

@section('content')
    <div class="list-group">
        <article class="center">
            <h4 class="list-group-item-heading">
                {{ $output->name }}
            </h4>
            <p class="list-group-item-text">
                <strong>
                    <em>Usuário</em>
                </strong>
                @if($output->user!=null)
                    {{ $output->user->name }}
                @endif
            </p>
            <p class="list-group-item-text">
                <strong>
                    <em>Cliente</em>
                </strong>
                @if($output->client!=null)
                    {{ $output->client->name }}
                @endif
            </p>
            <p class="list-group-item-text">
                <strong>
                    <em>Vencimento</em>
                </strong>
                {{ $output->due_date }}
            </p>
            <p class="list-group-item-text">
                <span class="label label-{{$progress[$output->progress]["class"]}}">
                    {{$progress[$output->progress]["name"]}}
                </span>
                @if($output->status)
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
            </p>
        </article>
    </div>
@stop