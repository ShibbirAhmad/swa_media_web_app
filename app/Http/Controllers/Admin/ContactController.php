<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }
    public function store(Request $request)
    {
        $store = new Contact();
        $store->name = $request->name;
        $store->email = $request->email;
        $store->subject = $request->subject;
        $store->message = $request->message;
        $store->save();
        return redirect()->back()->with('message', 'Your Message Sent');
        // Session::flash('message', 'This is a message!');
    }
}
