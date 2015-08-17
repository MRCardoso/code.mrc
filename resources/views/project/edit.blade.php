@extends('app')

@section('content')

    @include('errors.list')

    @include('project.form',
        [
            'type'=>'model',
            'dueDate' => ( $object->due_data!=""?date('d/m/Y'):null),
            'load' => $object,
            'params' => ['method'=>'PATCH','url'=>'project/'.$object->id,'class'=>'form-horizontal'],
        ]
    )
@stop