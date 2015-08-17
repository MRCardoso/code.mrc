@extends('app')

@section('content')

    @include('errors.list')

    @include('client.form',
        [
            'type'=>'open',
            'params' => ['url'=>'client','class'=>'form-horizontal'],
        ]
    )
@stop