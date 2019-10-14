<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|min:5',
            'description' => 'required|min:10',
            'job_title' => 'required|min:5',
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

        Customer::create($input);

        session()->flash('message', 'Customer Added Sucessfully.');

        return redirect('customers');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $customer = Customer::findOrFail($id);
        $request->validate([
            'name' => 'required|min:5',
            'description' => 'required|min:10',
            'job_title' => 'required|min:5'
        ]);
        
        $file = $request->file('image');

        if ($file) {

            $fileName = $file->getClientOriginalExtension();
        
            $fileName = uniqid() . '_hassan_salah_.'.$fileName;
        
            $file->move('images/', $fileName);
        
            $input['image'] = $fileName;

        } else {

            $input['image'] = $customer->image;

        }

        $customer->update([
            'name' =>$input['name'],
            'description'=>$input['description'],
            'image' =>$input['image'],
            'job_title' =>$input['job_title']
        ]);

        session()->flash('message', 'Category Updated Sucessfully.');

        return redirect('customers');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id)->delete();

        session()->flash('message', 'Customer Deleted Sucessfully.');

        return redirect('/customers');
    }
}
