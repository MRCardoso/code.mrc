@if($type == 'open')
{!! Form::$type($params) !!}
@elseif($type == 'model')
{!! Form::$type($load,$params) !!}
@endif
    <div class="form-group">
        <div class="col-md-3 control-label">
            {!! Form::label('status','Status:') !!}
        </div>
        <div class="col-md-6">
            <label class="radio-inline">
                {!! Form::radio('status', 1,true) !!} Ativo
            </label>
            <label class="radio-inline">
                {!! Form::radio('status', 0) !!} Inativo
            </label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 control-label">
            {!! Form::label('owner_id','User:') !!}
        </div>
        <div class="col-md-6">
            {!! Form::select('owner_id', $data->users,null,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 control-label">
            {!! Form::label('client_id','Client:') !!}
        </div>
        <div class="col-md-6">
            {!! Form::select('client_id', $data->clients,null,['class'=>'form-control']) !!}
        </div>
    </div>
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
            {!! Form::label('description','Descrição:') !!}
        </div>
        <div class="col-md-6">
            {!! Form::text('description',null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 control-label">
            {!! Form::label('progress','Progresso:') !!}
        </div>
        <div class="col-md-6">
            {!! Form::select('progress',$progress, null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 control-label">
            {!! Form::label('due_date','Vencimento:') !!}
        </div>
        <div class="col-md-6">
            {!! Form::text('due_date',$dueDate, ['class' => 'form-control datepicker']) !!}
        </div>
    </div>
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