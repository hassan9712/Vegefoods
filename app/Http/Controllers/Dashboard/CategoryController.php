<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $category = Category::create($this->validatedData());

        if(request()->has('image')) {
            $category->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);
        }

        session()->flash('message', 'Category Added Sucessfully.');

        return redirect('categories');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $category = Category::findOrFail($id);

        return view('category.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
         $input = $request->all();

        $category = Category::findOrFail($id);
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

                $input['image'] = $category->image;

            }

        

            $category->update([
                'name' =>$input['name'],
                'image' =>$input['image'],
            ]);

        session()->flash('message', 'Category Updated Sucessfully.');

        return redirect('categories');
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id)->delete();

        session()->flash('message', 'Category Deleted Sucessfully.');

        return redirect('/categories');
    }

    protected function validatedData()
    {
        return request()->validate([
            'name' => 'required|min:5',
            'image' => 'required|image|file|max:5000'
        ]);

    }
}










