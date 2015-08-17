<ul class="breadcrumb">
    <li><a href="/">Home</a></li>
    <li><a href="{{ url('/'.strtolower($module)) }}">{{ $module }}</a></li>
    @if(isset($save))
        <li class="active">{{ $save }}</li>
    @endif
</ul>