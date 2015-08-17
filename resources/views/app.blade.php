<!doctype html>
<html>
    <head>
        <title>
            laravel 5.1
        </title>
        <link rel="stylesheet" href="{{ url('/lib/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('/lib/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}">
        <link rel="stylesheet" href="{{ url('/css/style.css') }}">
    </head>
    <body>
        @include('partials.menu')
        @if(!isset($save))
            <div class="container">
                @include('partials.path',['module'=>$module])
                @if($output!==array())
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-11">
                            <div class="control-label">
                                <strong>
                                    Total de Registros {{$output->total()}}
                                </strong>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a href="{{ url('/'.strtolower($module).'/create') }}" class="btn btn-success">
                                    <span class="glyphicon glyphicon-plus"></span> Novo
                                </a>
                            </span>
                        </div>
                    </div>
                    @yield('content')
                    <div class="panel-footer">
                        <div class="text-right">
                            {!! $output->render() !!}
                        </div>
                    </div>
                </div>
                @endif
            </div>
        @else
            <div class="content content-small">
                @include('partials.path',['module'=>$module])
                @yield('content')
            </div>
        @endif
        <!-- Modal -->
        <div class="modal fade modal-remove" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                {!! Form::open(array('url'=>'','method' => 'delete','id'=>'form-delete')) !!}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning">
                            Voce deseja remover este {{$module}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Remover</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <script type="text/javascript" src="{{ url('/lib/jquery/dist/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ url('/lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('/lib/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('/js/mask.js') }}"></script>
        <script type="text/javascript" src="{{ url('/js/script.js') }}"></script>
    </body>
</html>