<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
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
        // display a view of all our catogories
        // form to create new categorie
        $categories = Category::all();
        return view('categories.index')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Save a new category
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();
        // redirect to index in complete

        Session::flash('success', 'Foi inserida uma nova categoria');
        return redirect()->route('categories.index');
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
        $category = Category::find($id);
        //dd($category);
        $postsCollection = Post::where('category_id', '=', $category->id)->get();

        return view('categories.show')->withCategory($category)->withPosts($postsCollection);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category =Category::find($id);
        return view('categories.edit')->withCategory($category);
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
        //
        $category = Category::find($id);
        $this->validate($request, ['name' => 'required|max:255']);
        $category->name = $request->name;

        $category->save();

        Session::flash('success', 'A categoria foi alterada com sucesso');

        return redirect()->route('categories.show', $category->id);
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
        $category = Category::find($id);
        //$category->posts()->detach();

        $category->delete();
        Session::flash('success', 'A categoria foi apagada com sucesso');
        return redirect()->route('categories.index');
    }
}
