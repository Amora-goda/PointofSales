<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\invoice;
use App\Models\invoice_details;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{

    public function index()
    {
        $invoices = invoice::all();
        return view('backend.invoices.index', compact('invoices'));
    }

    public function create()
    {
        $categories = categorie::all();
        return view('backend.invoices.create', compact('categories'));
    }

    public function store(Request $request)
    {

        DB::beginTransaction();

        try {

          $invoice = invoice::create([
                'invoice_number' => $request->invoice_number,
                'invoice_date' => $request->invoice_date,
                'categorie_id' => $request->categorie_id,
                'product_id' => $request->product_id,
                'price' => $request->price,
                'discount' => $request->discount,
                'tax_rate' => $request->tax_rate,
                'tax_value' => $request->tax_value,
                'total' => $request->total,
                'status' => 1,
                'notes' => $request->notes,
            ]);

            invoice_details::create([
                'invoice_id'=>$invoice->id,
                'status'=>1,
                'user_id'=>auth()->user()->id,
            ]);

            DB::commit();
            session()->flash('Add', 'تم اضافة الفاتورة بنجاح');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function edit($id)
    {
        $invoice = invoice::findorFail($id);
        $categories = categorie::all();
        return view('backend.invoices.edit', compact('categories', 'invoice'));
    }


    public function update(Request $request, $id)
    {
        try {

            $invoice = invoice::findorFail($id);

            $invoice->update([
                'invoice_number' => $request->invoice_number,
                'invoice_date' => $request->invoice_date,
                'categorie_id' => $request->categorie_id,
                'product_id' => $request->product_id,
                'price' => $request->price,
                'discount' => $request->discount,
                'tax_rate' => $request->tax_rate,
                'tax_value' => $request->tax_value,
                'total' => $request->total,
                'status' => 1,
                'notes' => $request->notes,
            ]);
            session()->flash('Edit', 'تم تعديل الفاتورة بنجاح');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        try {
            invoice::destroy($request->invoice_id);
            session()->flash('Deleted', 'تم حذف الفاتورة بنجاح');
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function getProduct($id)
    {
        $products = product::where('categorie_id', $id)->pluck('name', 'id');
        return $products;
    }

    public function getPrice($id)
    {
        $price = product::where('id', $id)->first()->price;
        return $price;
    }

    public function payment_statusChange(Request $request)
    {
        DB::beginTransaction();
        try {

            $invoice= invoice::findorFail($request->invoice_id);
            $invoice->update([
                'status'=>$request->status,
            ]);

            invoice_details::create([
                'invoice_id'=>$request->invoice_id,
                'status'=>$request->status,
                'payment_date'=>$request->payment_date,
                'user_id'=>auth()->user()->id,
            ]);

            DB::commit();
            session()->flash('Add', 'تم تغير حالة الفاتورة بنجاح');
            return redirect()->back();

        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
