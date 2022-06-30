<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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
        $category= Category::all();
        $product = Product:: all();
        return view('front.index')->with(['category'=>$category,'products'=>$product]);
    }

    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function shop()
    {
       
        return view('front.shop');
    }


    public function productdetail($slug)
    {
        $details= Product::where('slug',$slug)->first();
        return view('front.productdetails')->with('details',$details);

    }
}
