@if($type == 'open')
{!! Form::$type($params) !!}
@elseif($type == 'model')
{!! Form::$type($load,$params) !!}
@endif
    <div class="form-group">
        <div class="col-md-3 control-label">
            {!! Form::label('name','Nome:') !!}
        </div>
        <div class="col-md-6">
            {!! Form::text('name',null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 control-label">
            {!! Form::label('email','E-mail:') !!}
        </div>
        <div class="col-md-6">
            {!! Form::text('email',null, ['class' => 'form-control']) !!}
        </div>
    </div>
    @if($type=="open")
    <div class="form-group">
        <div class="col-md-3 control-label">
            {!! Form::label('password','Senha:') !!}
        </div>
        <div class="col-md-6">
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
    </div>
    @endif
    <div class="form-group">
        <div class="col-md-8"></div>
        <div class="col-md-2">
            <div class="input-group-btn">
                <a  href="/{{strtolower($module)}}" class="btn btn-default">Cancelar</a>
                {!! Form::submit('Save',['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
{!! Form::close() !!}