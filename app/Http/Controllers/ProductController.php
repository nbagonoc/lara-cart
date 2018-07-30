<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Comment;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.manage')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'status' => 'required',
            'category' => 'required',
            'description' => 'required',
            'imgPath' => 'required|image|max:500'
        ]);

        //file upload
        if($request->hasFile('imgPath')){
            //get filename with extension
            $filenameWithExt = $request->file('imgPath')->getClientOriginalName();
            //get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get extension
            $extension = $request->file('imgPath')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path  = $request->file('imgPath')->storeAs('public/imgPath', $fileNameToStore);
        }
        
        //create post
        $product = new Product;
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->status = $request->input('status');
        $product->category = $request->input('category');
        $product->description = $request->input('description');
        $product->imgPath = $fileNameToStore;
        $product->save();

        //redirect after creation
        return redirect('/products/manage')->with('success','Successfully added new product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $comments = Product::findOrFail($id)->comments;
        $product = Product::findOrFail($id);
        return view('products.show', compact('comments', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit')->with('product',$product);
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
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'status' => 'required',
            'category' => 'required',
            'description' => 'required',
            'imgPath' => 'image|max:500'
        ]);

        //file upload
        if($request->hasFile('imgPath')){
            //get filename with extension
            $filenameWithExt = $request->file('imgPath')->getClientOriginalName();
            //get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get extension
            $extension = $request->file('imgPath')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path  = $request->file('imgPath')->storeAs('public/imgPath', $fileNameToStore);
        }

        //update product
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->status = $request->input('status');
        $product->category = $request->input('category');
        $product->description = $request->input('description');
        if($request->hasFile('imgPath')){
            if($product->imgPath != 'default.png'){
                Storage::delete('public/imgPath/'.$product->imgPath);
                $product->imgPath = $fileNameToStore;
            } else {
                $product->imgPath = $fileNameToStore;
            }
        }
        $product->save();

        //redirect after update
        return redirect('/products/manage')->with('success','Successfully update product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        //redirect after delete
        return redirect('/products/manage')->with('success','Successfully deleted product');
    }
}
