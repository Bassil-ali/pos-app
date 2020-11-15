<?php

namespace App\Http\Controllers\Dashboard;
use App\month;
use App\Year;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index(Request $request)
    {


        $products = Product::when($request->search, function ($q) use ($request) {

            return $q->where('nameS','like', '%' . $request->search . '%')
            ->orwhere('valueS','like', '%' . $request->search . '%');

        })->when($request->product_id, function ($q) use ($request) {

            return $q->where('product_id', $request->product_id);

        })->latest()->paginate(5);

        return view('dashboard.products.index', compact( 'products'));

    }//end of index

    public function create()

    {
        $years = Year::get();
        $months = Month::get();
        return view('dashboard.products.create',compact('months','years'));

    }//end of create

    public function store(Request $request)
    {


        $request->validate([
            'nameS' => 'required',
            'valueS' => 'required',
            'month' => 'required',
            'year' => 'required'



           ]);

           Product::create($request->all());
           session()->flash('success', __('site.added_successfully'));
           return redirect()->route('dashboard.products.index');

        }//end of  for each


    public function edit(Product $product)
    {
        $years = Year::get();
        $months = Month::get();
        return view('dashboard.products.edit', compact('product','months','years'));

    }//end of edit

    public function update(Request $request, Product $product)
    {

        $request->validate([
            'nameS' => 'required',
            'valueS' => 'required',
            'month' => 'required',
            'year' => 'required'


           ]);
        $product->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.products.index');

    }//end of update

    public function destroy(Product $product)
    {


        $product->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.products.index');

    }//end of destroy

}//end of controller
