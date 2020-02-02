<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data=Product::join('productvariations','productvariations.id','=','products.productVariations')
                        ->join('categories','categories.id','=','products.productCategories')
                        ->select('products.*','productvariations.*','categories.name')
                        ->get();
        return view('user.home',['data'=>$data]);
    }
}
