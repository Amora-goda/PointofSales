<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Models\categorie;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
       $products = product::get();
       return view('backend.products.index',compact('products'));
    }


    public function create()
    {
        $categories = categorie::get();
        return view('backend.products.create',compact('categories'));
    }


    public function store(StoreProductsRequest $request)
    {
        try {

            product::create([
                'name'=> ['ar' => $request->name, 'en' => $request->name_en],
                'price'=>$request->price,
                'categorie_id'=>$request->categorie_id,
                'notes'=>$request->notes,
            ]);
            session()->flash('Add', 'تم اضافة المنتج بنجاح');
            return redirect()->back();

        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }



    }


    public function show(product $product)
    {
        //
    }


    public function edit($id)
    {
        $product = product::findorFail($id);
        $categories = categorie::get();
        return view('backend.products.edit',compact('product','categories'));

    }


    public function update(StoreProductsRequest $request, $id)
    {
        $product = product::findorFail($id);

        try {

            $product->update([
                'name'=> ['ar' => $request->name, 'en' => $request->name_en],
                'price'=>$request->price,
                'categorie_id'=>$request->categorie_id,
                'notes'=>$request->notes,
            ]);
            session()->flash('Edit', 'تم تعديل المنتج بنجاح');
            return redirect()->back();

        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function destroy(Request $request)
    {
        try {
            product::destroy($request->pro_id);
            session()->flash('Deleted', 'تم حذف المنتج بنجاح');
            return redirect('products');

        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
