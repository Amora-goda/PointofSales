@extends('layouts.backend.mastar')

@section('title')
    اضافة صلاحية جديدة
@endsection

@section('css')

@endsection

@section('content')

    <div class="page-title">
        <div class="row">
            @can('اضافة صلاحية')
            <div class="col-sm-6">
                <a class="btn btn-success" href="{{ route('roles.create') }}">اضافة</a>
            </div>
            @endcan
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">Page Title</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- main body -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                    <div class="row">
                        <div class="col-xs-7 col-sm-7 col-md-7">
                            <div class="form-group">
                                <strong>الاسم :</strong><br>
                                {!! Form::text('name', null, array('class' => 'form-control')) !!}
                            </div>
                        </div><br>

                        <div class="col-xl-7 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    <h5 class="card-title">الصلاحيات</h5>
                                    <div class="accordion gray plus-icon round">
                                        <div class="acd-group">
                                            <a href="#" class="acd-heading">صلاحيات المستخدمين</a>
                                            <div class="acd-des">
                                                @foreach($permission as $value)
                                                    <label style="font-size: 16px;">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                        {{ $value->name }}</label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-success">اضافة</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
@endsection



@section('js')

@endsection
