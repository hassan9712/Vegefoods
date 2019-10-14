<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::all();

        return view('slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('slider.create');
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

        Slider::create($input);

        session()->flash('message', 'Slider Added Sucessfully.');

        return redirect('sliders');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);

        return view('slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $slider = Slider::findOrFail($id);
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

            $input['image'] = $slider->image;

        }

        $slider->update([
            'name' =>$input['name'],
            'description'=>$input['description'],
            'image' =>$input['image'],
        ]);

        session()->flash('message', 'Slider Updated Sucessfully.');

        return redirect('sliders');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id)->delete();

        session()->flash('message', 'Slider Deleted Sucessfully.');

        return redirect('/sliders');
    }
}
