<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Contact;
use Illuminate\Http\Request;

class LabelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('labels.index')
            ->with('labels', Label::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('labels.show')->with('label', Label::where('id', $id)->first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('labels.create');
    }

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
        ]);


        Label::create([
            'name' => $request->input('name'),
            'color' => $request->input('color'),
            'user_id' => auth()->user()->id,
        ]);
        return redirect('/labels');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('labels.edit')->with('label', Label::where('id', $id)->first());
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
        ]);


        Label::where('id', $id)
        ->update([
            'name' => $request->input('name'),
            'color' => $request->input('color'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/labels');
    }

    public function attachContact(Request $request, $id)
    {
        $label = Label::find($id);
        $label->contacts()->attach($request->input('contact_id'));
        $label->save();

        return view('contacts.show')->with('contact', Contact::where('id', $request->input('contact_id'))->first())->with('labels', Label::orderBy('updated_at', 'DESC')->get());
    }

    public function detachContact(Request $request, $id)
    {
        $label = Label::find($id);
        $label->contacts()->detach($request->input('contact_id'));
        $label->save();

        return view('contacts.show')->with('contact', Contact::where('id', $request->input('contact_id'))->first())->with('labels', Label::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Remove the label from storage.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $label = Label::where('id', $id);
        $contact_id = $label->first()->contact_id;
        $label->delete();

        return redirect('/labels');
    }
}
