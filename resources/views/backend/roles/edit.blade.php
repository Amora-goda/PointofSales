@extends('layouts.backend.mastar')

@section('title')
صلاحيلات المستخدمين - مورا سوفت للادارة القانونية
@stop

@section('Page Title')
تعديل صلاحيات : {{ $role->name }}
@stop

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">

        <div class="pull-right">
        <a class="btn btn-success" href="{{ route('roles.index') }}"> رجوع</a>
        </div>
    </div>
</div><br>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>الصلاحيات:</strong>
            <br/><br/>
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-success">تحديث</button>
    </div>
</div>
{!! Form::close() !!}
@endsection
