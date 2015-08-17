@extends('app')

@section('content')

    @include('errors.list')

    @include('project.form',
        [
            'type'=>'open',
            'dueDate' => null,
            'params' => ['url'=>'project','class'=>'form-horizontal'],
        ]
    )
@stop