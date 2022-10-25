@extends('layouts.backend.mastar')

@section('title')
    اضافة فاتورة جديدة
@endsection

@section('css')

@endsection

@section('content')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> اضافة فاتورة جديدة</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">الرئيسية</a></li>
                    <li class="breadcrumb-item active">قائمة الفواتير</li>
                </ol>
            </div>
        </div>
    </div>

    @include('backend.massage')

    <!-- main body -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{route('invoices.store')}}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label>رقم الفاتوره</label>
                                <input type="text" name="invoice_number" value="{{old('invoice_number')}}"
                                       class="form-control @error('invoice_number') is-invalid @enderror" required>
                                @error('invoice_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col">
                                <label>تاريخ الفاتوره</label>
                                <input class="form-control" type="text" id="datepicker-action" name="invoice_date"
                                       data-date-format="yyyy-mm-dd" title="يرجي ادخال تاريخ الفاتورة" required>
                                @error('invoice_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <br>

                        <div class="row">

                            <div class="col">
                                <label>الاقسام</label>
                                <select name="categorie_id"
                                        class="form-control p-1  @error('categorie_id') is-invalid @enderror" required>
                                    <option value="" disabled selected> -- اختر من القائمه --</option>
                                    @foreach($categories as $categorie)
                                        <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                                    @endforeach
                                </select>
                                @error('categorie_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>المنتجات</label>
                                <select name="product_id"
                                        class="form-control p-1 @error('product_id') is-invalid @enderror"></select>
                                @error('product_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>سعر المنتج</label>
                                <input type="number" name="price" readonly id="price"
                                       class="form-control @error('amount_collection') is-invalid  @enderror">
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>الخصم</label>
                                <input type="number" name="discount" value="0" id="discount" onkeyup="myFunction2()"
                                       class="form-control @error('discount') is-invalid @enderror">
                                @error('discount')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>الاجمالي بعد الخصم</label>
                                <input type="number" name="total_after_discount" id="total_after_discount" value="0"
                                       readonly class="form-control @error('discount') is-invalid @enderror">
                                @error('discount')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <br>

                        <div class="row">

                            <div class="col-6">

                                <label>نسبة الضريبه</label>
                                <select name="tax_rate" onchange="myFunction1()" id="tax_rate" class="form-control p-1">
                                    <option value="" selected disabled>حدد نسبة الضريبة</option>
                                    <option value="5%">5%</option>
                                    <option value="10%">10%</option>
                                </select>
                                @error('tax_rate')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col">
                                <label>قيمة الضريبة </label>
                                <input type="text" readonly name="tax_value" id="tax_value"
                                       class="form-control @error('value_vat') is-invalid @enderror">
                                @error('value_vat')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>الاجمالي</label>
                                <input type="text" readonly name="total" id="total"
                                       class="form-control @error('total') is-invalid @enderror">
                                @error('total')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>ملاحظات</label>
                                <textarea rows="5" class="form-control" name="notes"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success">حفظ البيانات</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endsection

            @section('js')
                {{-- get products --}}
                <script>
                    $(document).ready(function () {
                        $('select[name="categorie_id"]').on('change', function () {
                            var categorie_id = $(this).val();
                            if (categorie_id) {
                                $.ajax({
                                    url: "{{ URL::to('product') }}/" + categorie_id
                                    , type: "GET"
                                    , dataType: "json"
                                    , success: function (data) {
                                        $('select[name="product_id"]').empty();
                                        $('input[name="price"]').val('');
                                        $('select[name="product_id"]').append('<option selected disabled > -- اختر من القائمه --</option>');
                                        $.each(data, function (key, value) {
                                            $('select[name="product_id"]').append('<option value="' + key + '">' + value + '</option>');
                                        });
                                    }
                                    ,
                                });

                            } else {
                                console.log('AJAX load did not work');
                            }
                        });
                    });
                </script>


                {{-- get price --}}
                <script>
                    $(document).ready(function () {
                        $('select[name="product_id"]').on('change', function () {
                            var product_id = $(this).val();
                        
                            if (product_id) {
                                $.ajax({
                                    url: "{{ URL::to('price') }}/" + product_id
                                    , type: "GET"
                                    , dataType: "json"
                                    , success: function (data) {
                                        $('input[name="price"]').val(data);
                                    }
                                });

                            } else {
                                console.log('AJAX load did not work');
                            }
                        });
                    });
                </script>


                <script>

                    function myFunction1(){
                        var total_after_discount = parseFloat(document.getElementById("total_after_discount").value);
                        var tax_rate = parseFloat(document.getElementById("tax_rate").value);
                        // {{-- tax_value --}}
                        var cal_tax_value = total_after_discount * tax_rate /100;
                        // {{-- total tax --}}
                        var final_total = parseFloat(cal_tax_value + total_after_discount);
                        document.getElementById("tax_value").value = parseFloat(cal_tax_value).toFixed(2);
                        document.getElementById("total").value = parseFloat(final_total).toFixed(2);
                    }


                    function myFunction2() {
                        var price =  parseFloat(document.getElementById("price").value);
                        var discount =  parseFloat(document.getElementById("discount").value);
                        document.getElementById("total_after_discount").value = price-discount;
                    }


                </script>




@endsection
