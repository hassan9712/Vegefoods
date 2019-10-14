<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }


    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }


    public function store(Request $request)
    {

        request()->validate([
            'name'  => 'required|min:5',
            'price' => 'required',
            'image' => 'required',
        ]);
        
        $input = $request->all();

        $file = $request->file('image');

        if ($file) {

            $fileName = $file->getClientOriginalExtension();
        
            $fileName = uniqid() . '_hassan_salah_.'.$fileName;
        
            $file->move('images/', $fileName);
        
            $input['image'] = $fileName;

        }

        Product::create($input);

        session()->flash('message', 'Product Added Sucessfully.');


        return redirect('products');
    }


    public function show($id)
    {
        //
    }

 
    public function edit($id){

        $product = Product::findOrFail($id);

        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

 
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $product = Product::findOrFail($id);
            $request->validate([
                'name' => 'required|min:5',
            ]);
        
            $file = $request->file('image');

            if ($file) {

                $fileName = $file->getClientOriginalExtension();
            
                $fileName = uniqid() . '_hassan_salah_.'.$fileName;
            
                $file->move('images/', $fileName);
            
                $input['image'] = $fileName;

            } else {

                $input['image'] = $product->image;

            }

            $product->update([
                'name' =>$input['name'],
                'price'=>$input['price'],
                'image' =>$input['image'],
            ]);

        session()->flash('message', 'Product Updated Sucessfully.');

        return redirect('products');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id)->delete();

        session()->flash('message', 'Product Deleted Sucessfully.');

        return redirect('/products');
    }

}