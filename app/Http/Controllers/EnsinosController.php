<?php

namespace App\Http\Controllers;

use App\Ensinos;
use App\Manuais;
use Illuminate\Http\Request;

class EnsinosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ensino = Ensinos::all();
        return view('ensinos.index')->withEnsinos($ensino);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {

        // Save a new ensino
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $ensino = new Ensinos;
        $ensino->name = $request->name;
        $ensino->save();
        // redirect to index in complete

        \Session::flash('success', 'Foi inserido um novo ensino');
        return redirect()->route('ensinos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ensinos  $ensinos
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        //
        $ensino = Ensinos::find($id);
        //dd($category);
        $manuaisCollection = Manuais::where('ensino_id', '=', $ensino->id)->get();

        return view('ensinos.show')->withEnsino($ensino)->withManuais($manuaisCollection);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ensinos  $ensinos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ensino = Ensinos::find($id);
        return view('ensinos.edit')->withEnsino($ensino);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ensinos  $ensinos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $ensino = Ensinos::find($id);
        $this->validate($request, ['name' => 'required|max:255']);
        $ensino->name = $request->name;


        $ensino->save();

        \Session::flash('success', 'O ensino foi alterada com sucesso');

        return redirect()->route('ensinos.show', $ensino->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ensinos  $ensinos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ensino = Ensinos::find($id);
        //$category->posts()->detach();

        $ensino->delete();
        \Session::flash('success', 'O ensino foi apagado com sucesso');
        return redirect()->route('ensinos.index');
    }
}
