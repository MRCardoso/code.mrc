@extends('app')

@section('content')
    <div class="list-group">
        <article class="center">
            <h4 class="list-group-item-heading">
                {{ $output->name }}
            </h4>
            <p class="list-group-item-text">
                <strong>
                    <em>Responsável</em>
                </strong>
                {{ $output->responsible }}
            </p>
            <p class="list-group-item-text">
                <strong>
                    <em>Observação</em>
                </strong>
                {{ $output->observation }}
            </p>
            <p class="list-group-item-text">
                <strong>
                    <em>E-mail</em>
                </strong>
                {{ $output->email }}
            </p>
            <p class="list-group-item-text">
                <strong>
                    <em>Telefone</em>
                </strong>
                {{ $output->phone }}
            </p>
            <p class="list-group-item-text">
                <strong>
                    <em>Endereço</em>
                </strong>
                {{ $output->address }}
            </p>
            @if($output->project!=null)
                <div class="list-group-item-text">
                    <strong>
                        <em>Projects</em>
                    </strong>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($output->project as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->description}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </article>
    </div>
@stop