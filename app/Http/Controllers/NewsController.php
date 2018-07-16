<?php

namespace App\Http\Controllers;
use App\News;


use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

        $this->middleware('auth')->except(['index', 'show']);

    }

    public function index()
    { 
        $news = News::orderBy('id','desc')->paginate(5);
        return view('new.index' , compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('new.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [

            'titre' => 'required|min:5',
            'contenu' => 'required|min:10',
        ]);
        News::create([

            'titre' => $request->titre,
            'contenu' => $request->contenu

        ]);

       return redirect(route('news.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $news = News::findOrFail($id);
      return view('new.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('new.edit', compact('news'));
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
       $this->validate($request, [

        'titre' => 'required|min:5',
        'contenu' => 'required|min:10',

       ]);

       $news = News::findOrFail($id);

       $news->update([

        'titre' => $request->titre,
        'contenu' => $request->contenu

       ]);
       session()->flash('message', 'Votre article a été modifié');

       return redirect(route('news.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect(route('news.index'));
    }
}
