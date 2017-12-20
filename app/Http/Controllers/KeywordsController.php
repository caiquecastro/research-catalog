<?php

namespace App\Http\Controllers;

use App\Keyword;
use Illuminate\Http\Request;
use App\Http\Requests\KeywordRequest;

class KeywordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Keyword::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $keyword = new Keyword;
        $keywords = Keyword::all();

        return view('keywords.create', compact('keyword', 'keywords'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeywordRequest $request)
    {
        Keyword::create($request->all());

        $request->session()->flash('message', 'Palavra-chave cadastrada com sucesso');

        return redirect()->route('keywords.create');
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
    public function edit(Keyword $keyword)
    {
        $keywords = Keyword::all();

        return view('keywords.edit', compact('keyword', 'keywords'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KeywordRequest $request, Keyword $keyword)
    {
        $keyword->update($request->all());

        $request->session()->flash('message', 'Palavra-chave atualizada com sucesso');

        return redirect()->route('keywords.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keyword $keyword, Request $request)
    {
        $keyword->delete();

        $request->session()->flash('message', 'Palavra-chave excluida com sucesso');

        return redirect()->route('keywords.create');
    }
}
