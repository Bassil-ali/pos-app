<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;

use App\month;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Year;

class OrderController2 extends Controller
{



        public function index(Request $request)
        {
            $years=Year::get();
            $months= month::get();





            $categories = Category::when($request->search, function ($q) use ($request) {

                return $q->where('month', '%' . $request->search . '%');

            })->when($request->month, function ($q) use ($request) {

                return $q->where('month', $request->month);

            })->when($request->year, function ($q) use ($request) {

                return $q->where('year', $request->year);

            })->get();





            $products = Product::when($request->search, function ($q) use ($request) {

                return $q->where('month', '%' . $request->search . '%');

            })->when($request->month, function ($q) use ($request) {

                return $q->where('month', $request->month);

            })->when($request->year, function ($q) use ($request) {

                return $q->where('year', $request->year);

            })->get();

            $users = User::whereRoleIs('admin')->get();

            return view('dashboard.index2',compact('categories','years','months','products','users'));
        }
    //end of index

}//end of controller
