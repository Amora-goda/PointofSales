@extends('layouts.backend.mastar')
@section('css')

@endsection
@section('title')
    قائمه الفواتير
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> قائمه الفواتير</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">قائمه الفواتير</a></li>
                    <li class="breadcrumb-item active">الفواتير</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <div class="row">
                        <div class="col mb-3">
                            <a href="{{route('invoices.create')}}" class="btn  btn-outline-primary">اضافه فاتوره
                                جديده</a>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0 text-center table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>رقم الفاتوره</th>
                                <th>تاريخ الفاتوره</th>
                                <th>القسم</th>
                                <th>المنتج</th>
                                <th>السعر</th>
                                <th>الخصم</th>
                                <th>نسبة الضريبة</th>
                                <th>قيمة الضريبه</th>
                                <th>حالة الفاتورة</th>
                                <th>الاجمالي</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$invoice->invoice_number}}</td>
                                    <td>{{$invoice->invoice_date}}</td>
                                    <td>{{$invoice->categorie->name}}</td>
                                    <td>{{$invoice->product->name}}</td>
                                    <td>{{$invoice->price}}</td>
                                    <td>{{$invoice->discount}}</td>
                                    <td>{{$invoice->tax_rate}}</td>
                                    <td>{{$invoice->tax_value}}</td>
                                    <td class={{$invoice->status == 1 ? 'text-danger':'text-success'}}>{{$invoice->status == 1 ? 'غير مدفوعة':'تم الدفع'}}</td>
                                    <td>{{$invoice->total}}</td>
                                    <td>
                                        <a href="{{route('invoices.edit',$invoice->id)}}" class="btn btn-info btn-sm"
                                           title="تعديل" role="button" aria-pressed="true"><i
                                                class="fa fa-edit"></i></a>
                                        <button class="btn btn-warning btn-sm" title="تغير حالة الدفع" data-toggle="modal" data-target="#Payment_status_change{{$invoice->id}}"><i class="fa fa-trash"></i></button>

                                        <button class="btn btn-danger btn-sm" data-invoice_id="{{$invoice->id}}"
                                                data-toggle="modal" data-target="#deletedinvoice"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @include('backend.invoices.change_status')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('backend.invoices.deleted')
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script>
        $('#deletedinvoice').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var invoice_id = button.data('invoice_id')
            var modal = $(this)
            modal.find('.modal-body #invoice_id').val(invoice_id);
        })
    </script>
@endsection
