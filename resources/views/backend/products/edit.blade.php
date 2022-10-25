@extends('layouts.backend.mastar')

@section('title')
   تعديل منتج
@endsection

@section('css')

@endsection

@section('content')
    @include('backend.massage')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">تعديل منتج </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">الرئيسية</a></li>
                    <li class="breadcrumb-item active">المنتجات</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- main body -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{route('products.update',$product->id)}}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>اسم المنتج بالغه العربيه</label>
                                <input type="text" name="name" value="{{$product->getTranslation('name','ar')}}" class="form-control @error('name') is-invalid @enderror">
                                {{-- Input hidden id --}}
                                <input type="hidden" name="id" value="{{$product->id}}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>اسم المنتج بالغه الانجليزيه</label>
                                <input type="text" name="name_en" value="{{$product->getTranslation('name','en')}}" class="form-control @error('name_en') is-invalid @enderror" required>
                                @error('name_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>اسم المنتج</label>
                                <select name="categorie_id" id="" class="form-control p-1">
                                    @foreach($categories as $categorie)
                                        <option value="{{$categorie->id}}" {{$categorie->id == $product->categorie_id ? 'selected' : ''}}>{{$categorie->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>سعر المنتج</label>
                                <input type="number" name="price" value="{{$product->price}}" class="form-control @error('price') is-invalid @enderror">
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>ملاحظات</label>
                            <textarea name="notes" class="form-control" rows="5">{{$product->notes}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success">حفظ البيانات</button>
                    </form>
                </div>
            </div>
@endsection

@section('js')

@endsection
