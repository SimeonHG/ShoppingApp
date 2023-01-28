<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Contact;
use Illuminate\Http\Request;

class LabelsController extends Controller
{

    /**
     * Store a label in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'color' => 'required',
            'contact_id' => 'required'
        ]);


        Label::create([
            'name' => $request->input('name'),
            'color' => $request->input('color'),
            'contact_id' => $request->input('contact_id'),

        ]);
        return view('contacts.show')->with('contact', Contact::where('id', $request->input('contact_id'))->first())->with('message', 'Contact labeled!');
    }

    /**
     * Update the label in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'color' => 'required',
            'contact_id' => 'required'
        ]);


        Contact::where('id', $id)
        ->update([
            'name' => $request->input('name'),
            'color' => $request->input('color'),
            'contact_id' => $request->input('contact_id'),
        ]);
    
        return view('contacts.show')->with('contact', Contact::where('id', $id)->first())->with('message', 'Label changed!');
    }

    /**
     * Remove the label from storage.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Label::where('id', $id);
        $contact->delete();

        return view('contacts.show')->with('contact', Contact::where('id', $id)->first())->with('message', 'Label deleted!');
    }
}
