@extends('layouts.backend.mastar')

@section('title')
صلاحيلات المستخدمين - مورا سوفت للادارة القانونية
@stop

@section('Page Title')
 صلاحيات : {{ $role->name }}
@stop


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">

        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('roles.index') }}"> رجوع</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">

        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                <span class="badge badge-info">{{ $v->name }},</span>

                @endforeach
            @endif
        </div>
    </div>
</div>
@stop
