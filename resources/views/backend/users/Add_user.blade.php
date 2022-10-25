@extends('layouts.backend.mastar')

@section('title')
اضافة مستخدم - مورا سوفت للادارة القانونية
@stop

@section('Page Title')
اضافة مستخدم
@stop



@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
        <a class="btn btn-success" href="{{ route('users.index') }}">رجوع</a>
        </div>
    </div>
</div><br>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>خطا !</strong>يوجد خطا في البيانات<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif



{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>اسم المستخدم</strong>
            {!! Form::text('name', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>البريد الالكتروني</strong>
            {!! Form::text('email', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>كلمة المرور</strong>
            {!! Form::password('password', array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>تاكيد كلمة المرور</strong>
            {!! Form::password('confirm-password', array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>نوع المستخدم</strong>
            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-success">اضافة</button>
    </div>
</div>
{!! Form::close() !!}

@endsection
