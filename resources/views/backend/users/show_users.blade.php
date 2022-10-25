@extends('layouts.backend.mastar')

@section('title')
    المستخدمين
@endsection

@section('css')

@endsection

@section('content')
    @include('backend.massage')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">المستخدمين</h4>
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
                    @can('اضافة مستخدم')
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('users.create') }}">اضافة مستخدم</a>
                        </div>
                    @endcan
                    <div class="table-responsive mt-15">
                        <table id="datatable" class="table table-striped table-bordered p-0 text-center table-hover">
                            <tr>
                                <th>#</th>
                                <th>اسم المستخدم</th>
                                <th>البريد الالكتروني</th>
                                <th>نوع المستخدم</th>
                                <th width="280px">العمليات</th>
                            </tr>
                            @foreach ($data as $key => $user)
                                <tr style=" text-align: center;">
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>

                                    <td>
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @can('تعديل مستخدم')
                                            <a class="btn btn-warning" href="{{ route('users.edit',$user->id) }}">تعديل</a>
                                        @endcan

                                        @can('حذف مستخدم')
                                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
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
