<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;
use Image;
use Purifier;
use Session;
use Input;
use App\Category;

class PostController extends Controller
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
        // create a variable and store all the blog post in it form the database
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        // return a view and pass in the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // DIE AND DUMP - MUITO BOM
        //dd($request);
        //Validar os dados
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required',
            'slug' => 'required|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'featured_img' => 'sometimes|image'
        ]);
        //Guardar na BD
        $post = new Post;

        $post->title = $request->title;
        $post->slug = str_slug($request->slug);
        $post->body = Purifier::clean($request->body);
        $post->category_id = $request->category_id;

        //Store image
        if ($request->hasFile('featured_img')) {
            $image = $request->file('featured_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $img_index = Image::make($image);
            $img_lastPost = Image::make($image);
            $img_single = Image::make($image);
            $img_blog = Image::make($image);

            $img_lastPost->resize(73, 73, function ($constraint) {
                $constraint->aspectRatio();
            });

                $img_index->resize(338, 348, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img_single->resize(720, 348, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img_blog->resize(309, 267, function ($constraint) {
                    $constraint->aspectRatio();
                });

            //Backgrou color #e8e8e8
            $img_lastPost->resizeCanvas(73, 73, 'center', false, '#ffffff');
            $img_index->resizeCanvas(344, 354, 'center', false, '#ffffff');
            $img_single->resizeCanvas(726, 355, 'center', false, '#ffffff');
            $img_blog->resizeCanvas(330, 273, 'center', false, '#ffffff');
            $img_lastPost->save(public_path('images/Posts/lastPost_'.$filename));
            $img_index->save(public_path('images/Posts/index_' . $filename));
            $img_single->save(public_path('images/Posts/single_' . $filename));
            $img_blog->save(public_path('images/Posts/blog_' . $filename));

            $post->image = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'The blog post foi criado com sucesso');


        //redirect para algum lado

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // encontrar o post na BD e guardar como uma var
        $post = Post::find($id);
        $categories = Category::all();
        $cats = [];
        $tags = Tag::all();
        $tags2 = [];
        foreach($tags as $tag){
            $tags2[$tag->id] = $tag->name;
        }
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        // retornar a vista e passar a variávivel que sacamos da BD
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->tags);
        $post = Post::find($id);
        // Validar o formulario

            $this->validate($request, [
                'title'         => 'required|max:255',
                'body'          => 'required',
                'slug'          => "required|min:5|max:255|unique:posts,slug,$id",
                'category_id'   => 'required|integer',
                'featured_img'  => 'image'
            ]);

        // GUardar o form na BD


        $post->title = $request->input('title');
        $post->slug = str_slug($request->input('slug'));
        $post->body = Purifier::clean($request->input('body'));
        $post->category_id = $request->category_id;

        //Store image
        if ($request->hasFile('featured_img')) {
            $image = $request->file('featured_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $img_index = Image::make($image);
            $img_lastPost= Image::make($image);
            $img_single = Image::make($image);
            $img_blog = Image::make($image);


            $img_lastPost->resize(73, 73, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_index->resize(338, 348, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_single->resize(720, 348, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_blog->resize(309, 267, function ($constraint) {
                $constraint->aspectRatio();
            });

            //Backgrou color #e8e8e8
            $img_lastPost->resizeCanvas (73,73,'center',false,'#ffffff');
            $img_index->resizeCanvas(344, 354, 'center', false, '#ffffff');
            $img_single->resizeCanvas(726, 355, 'center', false, '#ffffff');
            $img_blog->resizeCanvas(330, 273, 'center', false, '#ffffff');
            $img_index->save(public_path('images/Posts/index_' . $filename));
            $img_single->save(public_path('images/Posts/single_' . $filename));
            $img_blog->save(public_path('images/Posts/blog_' . $filename));
            $img_lastPost->save(public_path('images/Posts/lastPost_'.$filename));

            $old_filename = $post->image;

            $post->image = $filename;

            Storage::delete("Posts/index_".$old_filename);
            Storage::delete("Posts/blog_".$old_filename);
            Storage::delete("Posts/single_".$old_filename);
            Storage::delete("Posts/lastPost_".$old_filename);
        }

        $post->save();

        $post->tags()->sync($request->tags);

        // set flash sucess message
        Session::flash('success', 'Post alterado com sucesso!');

        // redirect com o session flash to post.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete("Posts/index_".$post->image);
        Storage::delete("Posts/blog_".$post->image);
        Storage::delete("Posts/single_".$post->image);
        Storage::delete("Posts/lastPost_".$post->image);
        $post->delete();
        Session::flash('success', 'O Post foi apagado com sucesso');
        return redirect()->route('posts.index');
    }
}
