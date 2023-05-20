<?php

namespace App\Http\Controllers;
use App\Models\Card;


use Illuminate\Http\Request;

class CardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cards.index')
        ->with('card', Card::orderBy('updated_at', 'DESC')->get());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cards.create');
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
            'number' => 'required'
        ]);


        Card::create([
            'number' => $request->input('number'),
            'bankName' => $request->input('bankName'),
            'secCode' => $request->input('secCode'),
            'user_id' => auth()->user()->id

        ]);
        return redirect('/cards')->with('message', 'Card created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('cards.show')->with('card', Card::where('id', $id)->first());

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('cards.edit')->with('card', Card::where('id', $id)->first());

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
            'number' => 'required'
        ]);


        Card::where('id', $id)
        ->update([
            'number' => $request->input('number'),
            'bankName' => $request->input('bankName'),
            'secCode' => $request->input('secCode'),
            'user_id' => auth()->user()->id

        ]);
        return redirect('/cards')->with('message', 'Card updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $card = Card::where('id', $id);
        $card->delete();

        return redirect('/cards')->with('message', 'Card deleted!');

    }
}
