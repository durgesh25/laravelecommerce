<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Product::all();
        return view('admin.product.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category= Category::all();
        return view('admin.product.create')->with('category',$category);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate= $request->validate([
            'name'=>'required',
            'img'=>'required'
        ]);
        $product = new Product;
        if($request->hasFile('img'))
        {
          //Get the filename with the extension
          $filenameWE = $request->file('img')->getClientOriginalName();
          //Get just the file name
          $filename = pathinfo($filenameWE, PATHINFO_FILENAME);
          //Get just the extension
          $extension = $request->file('img')->getClientOriginalExtension();
           //Filename to store
          $primg = $filename.'_'.time().'.'.$extension;

          $request->file('img')->move(public_path('uploads'), $primg);
          $product->image=$primg;

        }
        $product->name= $request->name;
        $product->slug= Str::slug($request->name);
        $product->short_description= $request->short_description;
        $product->description= $request->description;
        $product->price= $request->price;
        $product->discount_price= $request->discount_price;
        $product->status=$request->status;
        $product->category_id=$request->category;
        $product->save();
        Session::flash("success","product create successfuly"); 
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
