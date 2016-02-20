@extends('app')

@section('content')

    @include('errors.list')

    @include('user.form',
        [
            'type'=>'model',
            'load' => $object,
            'params' => ['method'=>'PATCH','url'=>'user/'.$object->id,'class'=>'form-horizontal'],
        ]
    )
@stop