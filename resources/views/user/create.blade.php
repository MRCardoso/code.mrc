@extends('app')

@section('content')

    @include('errors.list')

    @include('user.form',
        [
            'type'=>'open',
            'params' => ['url'=>'user','class'=>'form-horizontal'],
        ]
    )
@stop