@extends('layouts.backend.mastar')
@section('css')

@section('title')
    الاقسام
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> الاقسام</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">الاعدادات</a></li>
                    <li class="breadcrumb-item active">الاقسام</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
     @include('backend.massage')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <div class="row">
                        <div class="col mb-3">
                            <button class="btn btn-success" data-toggle="modal" data-target="#AddCategories">اضافه قسم
                                جديد
                            </button>
                        </div>

                        @include('backend.categories.create')

                    </div>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0 text-center table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم القسم</th>
                                <th>ملاحظات</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $categorie)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$categorie->name}}</td>
                                    <td>{{$categorie->notes == true ? $categorie->notes : 'لا توجد ملاحظات'}}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm" title="تعديل" data-toggle="modal"
                                                data-target="#Editcategorie{{$categorie->id}}"><i
                                                class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm" title="حذف" data-toggle="modal"
                                                data-target="#Deleted{{$categorie->id}}"><i class="fa fa-trash"></i>
                                        </button>

                                    </td>

                                </tr>

                            @include('backend.categories.edit')
                            @include('backend.categories.deleted')
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
@endsection
@section('js')



@endsection
