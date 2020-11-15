<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\month;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Year;

class CategoryController extends Controller
{
    public function index(Request $request)
    {


        $categories = Category::when($request->search, function ($q) use ($request) {

            return $q->where('nameA','like', '%' . $request->search . '%')
           ->orwhere('nameV','like', '%' . $request->search . '%')
            ;

        })->latest()->paginate(5);

        return view('dashboard.categories.index', compact('categories'));

    }//end of index

    public function create()
    {
        $years = Year::get();
        $months = Month::get();
        return view('dashboard.categories.create',compact('months','years'));

    }//end of create

    public function store(Request $request)
    {


        $request->validate([
         'nameA' => 'required',
         'nameV' => 'required',
         'month' => 'required',
         'year' => 'required'



        ]);
        $posts=  Category::create($request->all());



        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.categories.index');

    }//end of store

    public function edit(Category $category)
    {
        $years = Year::get();
        $months = Month::get();
        return view('dashboard.categories.edit', compact('category','months','years'));

    }//end of edit

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nameA' => 'required',
            'nameV' => 'required',
            'month' => 'required',
             'year' => 'required'


           ]);
           $category->update($request->all());
          session()->flash('success', __('site.updated_successfully'));
          return redirect()->route('dashboard.categories.index');


    }//end of update

    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.categories.index');

    }//end of destroy

}//end of controller
