@extends('app')

@section('content')

    @include('errors.list')

    @include('client.form',
        [
            'type'=>'model',
            'load' => $object,
            'params' => ['method'=>'PATCH','url'=>'client/'.$object->id,'class'=>'form-horizontal'],
        ]
    )
@stop