<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Logo;

class LogoController extends Controller
{
    public function index()
    {
        $logos = Logo::all();

        return view('logo.index', compact('logos'));
    }

    public function create()
    {
        return view('logo.create');
    }

    public function store(Request $request)
    {
        request()->validate([
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

        Logo::create($input);

        session()->flash('message', 'Logo Added Sucessfully.');

        return redirect('logos');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $logo = Logo::findOrFail($id);

        return view('logo.edit', compact('logo'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $logo = Logo::findOrFail($id);
        $request->validate([
            'image' => 'required',
        ]);
        
        $file = $request->file('image');

        if ($file) {

            $fileName = $file->getClientOriginalExtension();
        
            $fileName = uniqid() . '_hassan_salah_.'.$fileName;
        
            $file->move('images/', $fileName);
        
            $input['image'] = $fileName;

        } else {

            $input['image'] = $logo->image;

        }

        $logo->update([
            'image' =>$input['image'],
        ]);

        session()->flash('message', 'Logo Updated Sucessfully.');

        return redirect('logos');
    }

    public function destroy($id)
    {
        $logo = Logo::findOrFail($id)->delete();

        session()->flash('message', 'Logo Deleted Sucessfully.');

        return redirect('/logos');
    }
}
