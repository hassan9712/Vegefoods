<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::all();

        return view('blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|min:5',
            'description' => 'required|min:10',
            'image' => 'required'
        ]);

        $input = $request->all();

        $file = $request->file('image');

        if ($file) {

            $fileName = $file->getClientOriginalExtension();
        
            $fileName = uniqid() . '_hassan_salah_.'.$fileName;
        
            $file->move('images/', $fileName);
        
            $input['image'] = $fileName;

        }

        Blog::create($input);

        session()->flash('message', 'Blog Added Sucessfully.');

        return redirect('blogs');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        return view('blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $blog = Blog::findOrFail($id);
        $request->validate([
            'name' => 'required|min:5',
            'description' => 'required|min:10'
        ]);
        
        $file = $request->file('image');

        if ($file) {

            $fileName = $file->getClientOriginalExtension();
        
            $fileName = uniqid() . '_hassan_salah_.'.$fileName;
        
            $file->move('images/', $fileName);
        
            $input['image'] = $fileName;

        } else {

            $input['image'] = $blog->image;

        }

        $blog->update([
            'name' =>$input['name'],
            'description'=>$input['description'],
            'image' =>$input['image'],
        ]);

        session()->flash('message', 'Blog Updated Sucessfully.');

        return redirect('blogs');

    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id)->delete();

        session()->flash('message', 'Blog Deleted Sucessfully.');

        return redirect('/blogs');
    }
}
