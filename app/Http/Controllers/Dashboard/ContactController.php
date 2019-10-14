<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::all();

        return view('contact.index', compact('contacts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);

        return view('contact.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $contact = Contact::findOrFail($id);
            $request->validate([
                'address' => 'required|min:5',
                'phone' => 'required|min:5',
                'email' => 'required|email',
                'website' => 'required|min:8'
            ]);

            $contact->update([
                'address' =>$input['address'],
                'phone' =>$input['phone'],
                'email' =>$input['email'],
                'website' =>$input['website'],
            ]);

        session()->flash('message', 'Information Updated Sucessfully.');

        return redirect('contact');
    }

    public function destroy($id)
    {
        //
    }
}
