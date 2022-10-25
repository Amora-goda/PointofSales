@extends('layouts.backend.mastar')

@section('title')
    صلاحيات المستخدمين
@endsection

@section('css')

@endsection

@section('content')

    @include('backend.massage')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">  صلاحيات المستخدمين</h4>
            </div>
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

                    @can('اضافة صلاحية')
                        <a class="btn btn-success" href="{{ route('roles.create') }}">اضافة</a>
                    @endcan

                    <table id="datatable" class="table table-striped table-bordered p-0 text-center table-hover">
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th width="280px">العمليات</th>
                        </tr>
                        @foreach ($roles as $key => $role)
                            <tr style=" text-align: center;">
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @can('عرض صلاحية')
                                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">عرض</a>
                                    @endcan

                                    @can('تعديل صلاحية')
                                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">تعديل</a>
                                    @endcan

                                    @can('حذف صلاحية')
                                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>


@endsection

@section('js')

@endsection
