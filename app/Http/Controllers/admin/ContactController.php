<?php

namespace App\Http\Controllers\admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contacts.index')->with(['contacts' => Contact::paginate(10)]);
    }

    public function create()
    {
        return view('admin.contacts.create');
    }

    public function store(Request $request)
    {
        $contacts = new Contact();
        $contacts->name = $request->input('name');
        $contacts->email = $request->input('email');
        $contacts->message = $request->input('message');
        $contacts->phone = $request->input('phone');
        $contacts->save();
        return redirect()->back()->with('success', 'created successfully');
    }

    public function show($id)
    {
        $showContact = Contact::find($id);
        return view('admin.contacts.show', ['showContact' => $showContact]);
    }

    public function edit($id)
    {
        return view('admin.contacts.edit', ['contact' =>  Contact::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $contacts = Contact::find($id);
        $contacts->name = $request->input('name');
        $contacts->email = $request->input('email');
        $contacts->message = $request->input('message');
        $contacts->phone = $request->input('phone');
        $contacts->save();
        return redirect()->back()->with('success', 'updated successfully');
    }

    public function destroy($id)
    {
        $contacts = Contact::find($id)->delete();
        return redirect()->route('contacts.index');
    }

    public function replay(Request $request)
    {
        $contacts = Contact::find($request->course_id);
        $contacts->replay = $request->message1;
        $contacts->save();
        return redirect()->route('contacts.index');
    }
}
