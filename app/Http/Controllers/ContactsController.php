<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contacts.index')
            ->with('contacts', Contact::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required'
        ]);


        Contact::create([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'firmName' => $request->input('firmName'),
            'adress' => $request->input('adress'),
            'phoneNumber' => $request->input('phoneNumber'),
            'mobileNumber' => $request->input('mobileNumber'),
            'email' => $request->input('email'),
            'fax' => $request->input('fax'),
            'comment' => $request->input('comment'),
            'user_id' => auth()->user()->id

        ]);
        return redirect('/contacts')->with('message', 'Contact created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('contacts.show')->with('contact', Contact::where('id', $id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('contacts.edit')->with('contact', Contact::where('id', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fname' => 'required'
        ]);

        Contact::where('id', $id)
        ->update([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'firmName' => $request->input('firmName'),
            'adress' => $request->input('adress'),
            'phoneNumber' => $request->input('phoneNumber'),
            'mobileNumber' => $request->input('mobileNumber'),
            'email' => $request->input('email'),
            'fax' => $request->input('fax'),
            'comment' => $request->input('comment'),
            'user_id' => auth()->user()->id
        ]);
    
        return redirect('/contacts')->with('message', 'Contact updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::where('id', $id);
        $contact->delete();

        return redirect('/contacts')->with('message', 'Contact deleted!');
    }
}
