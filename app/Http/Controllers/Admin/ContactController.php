<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::where('is_deleted', false)->orderBy('id','desc')->get();
        return view('admin.contact.index', compact('contact'));
    }

    public function create()
    {
        return view('404');
    }

    public function store(Request $request)
    {
      //  dd($request);
        $request->validate([
            'name' => 'required',

            'email'=> 'required',
            'subject'=> 'required',
            'message'=> 'required',

        ]);

        Contact::create([

            'name' => $request->name,
            'email'=> $request->email,
            'subject'=> $request->subject,
            'message'=> $request->message,
        ]);

        return redirect('/contact')->with('success', 'Contact created successfully');
    }

    public function edit(Contact $contact)
    {
        return view('admin.contact.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'email'=> 'required',
            'subject'=> 'required',
            'message'=> 'required',
        ]);

        $contact->update([
            'name' => $request->name,
            'email'=> $request->email,
            'subject'=> $request->subject,
            'message'=> $request->message,
        ]);

        return redirect('/dashboard/contact')->with('success', 'Contact updated successfully');
    }

    public function destroy( $id)
    {
        $model = Contact::find($id);
        $model->update(['is_deleted' => 1]);
        return response()->json(['result' => true]);
    }
}
