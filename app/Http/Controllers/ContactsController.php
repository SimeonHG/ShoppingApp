<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Label;
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
        return view('contacts.show')->with('contact', Contact::where('id', $id)->first())->with('labels', Label::orderBy('updated_at', 'DESC')->get());
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

    public function popular()
    {
        $labels = Label::orderBy('updated_at', 'DESC')->get();
        $max = $labels->first();
        $maxCount = $labels->first()->contacts->count();
        foreach ($labels as $label)
        {
            if ($label->contacts->count() > $maxCount)
            {
                $max = $label;
                $maxCount = $label->contacts->count();
            }
        }
        error_log($label);
        return view('contacts.popular')
            ->with('contacts', $max->contacts);        ;
    }

    public function sameFirstName()
    {
        return view('contacts.sameFirstName')->with('contacts', []);
    }

    public function getSameFirstName(Request $request)
    {
        $request->validate([
            'fname' => 'required'
        ]);

        error_log($request->fname);

        $contacts = Contact::where('fname', $request->fname);
        
        return view('contacts.sameFirstName')->with('contacts', $contacts->get());
    }

    public function sameLastName()
    {
        return view('contacts.sameLastName')->with('contacts', []);
    }

    public function getSameLastName(Request $request)
    {
        $request->validate([
            'lname' => 'required'
        ]);

        error_log($request->lname);

        $contacts = Contact::where('lname', $request->lname);

        return view('contacts.sameLastName')->with('contacts', $contacts->get());
    }

    public function givenContact()
    {
        return view('contacts.givenContact')->with('contacts', []);
    }

    public function getGivenContact(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required'
        ]);

        error_log($request->fname);

        $contacts = Contact::where('fname', $request->fname)
            ->where('lname', $request->lname);
        
        return view('contacts.givenContact')->with('contacts', $contacts->get());
    }
}
