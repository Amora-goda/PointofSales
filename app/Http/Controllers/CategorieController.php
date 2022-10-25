<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriesRequest;
use App\Models\categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{

    public function index()
    {
       $categories = categorie::get();
       return view('backend.categories.index',compact('categories'));
    }


    public function create()
    {
        //
    }


    public function store(StoreCategoriesRequest $request)
    {
        try {

            categorie::create([
                'name'=> ['ar' => $request->name, 'en' => $request->name_en],
                'notes'=>$request->notes,
            ]);
            session()->flash('Add', 'تم اضافة القسم بنجاح');
            return redirect('categories');

//            $categories = new categorie();
//            //$categories->name = ['ar' => $request->name, 'en' => $request->name_en];
//            $categories->notes = $request->notes;
//            $categories->save();
//             session()->flash('Add', 'تم اضافة المنتج بنجاح ');
//            return redirect('categories');

        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function show(categorie $categorie)
    {
        //
    }


    public function edit(categorie $categorie)
    {
        //
    }


    public function update(StoreCategoriesRequest $request)
    {
        $categorie = categorie::findorFail($request->id);

        try {

            $categorie->update([
                'name'=> ['ar' => $request->name, 'en' => $request->name_en],
                'notes'=>$request->notes,
            ]);
            session()->flash('Edit', 'تم تعديل القسم بنجاح');
            return redirect('categories');

//            $categories = categorie::findorfail($request->id);
//            $categories->name = ['ar' => $request->name, 'en' => $request->name_en];
//            $categories->notes = $request->notes;
//            $categories->save();
//            session()->flash('Edit', 'تم تعديل المنتج بنجاح');
//            return redirect('categories');

        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        try {

//          categorie::findorFail($id)->delete();
            categorie::destroy($id);
            session()->flash('Deleted', 'تم حذف القسم بنجاح');
            return redirect('categories');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
