<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResearcherRequest;
use App\Researcher;
use App\Role;

class ResearchersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $researchers = Researcher::all();

        return view('researchers.index', compact('researchers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $researcher = new Researcher;
        $roles = Role::all();
        $subjects = [];

        return view('researchers.create', compact('researcher', 'roles', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResearcherRequest $request)
    {
        Researcher::create($request->all());

        $request->session()->flash('message', 'Servidor cadastrado com sucesso');

        return redirect()->route('researchers.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Researcher $researcher)
    {
        $roles = Role::all();
        $subjects = [];

        return view('researchers.edit', compact('researcher', 'roles', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResearcherRequest $request, Researcher $researcher)
    {
        $researcher->update($request->all());

        return redirect('researchers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
