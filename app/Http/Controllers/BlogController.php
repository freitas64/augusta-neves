<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Tag;
use App\Sobre;



class BlogController extends Controller
{
    public function getIndex(){
        $posts = Post::paginate(10);

        return view('blog.index')->withPosts($posts);
    }

    public function getSingle($slug){
        // buscar da BD pela slug
        $last = Post::orderBy('id', 'desc')->take(3)->get();
        $categories = Category::all();
        $posts =Post::all();
        $post = Post::where('slug', '=', $slug)->first();
        // retornar a view e passa o post
        $about=Sobre::all();

        return view('blog.single')->withPost($post)->withAbout($about)->withPosts($posts)->withLast($last)
            ->withCategories($categories);
    }

    public function getCategory($id){

        $posts = Post::where('category_id', '=', $id)->orderBy('id', 'desc');
        $info = ['name' => Category::find($id)->name, 'total' => $posts->count()];
        $categories = Category::all();

        return view('blog.category')->withCategories($categories)->withInfo($info)->withPosts($posts->paginate(5));
    }

    public function getTag($id){
        $tag = Tag::find($id);
        $posts = $tag->posts()->orderBy('id','desc')->paginate(5);
        $categories = Category::all();
        //dd($tag->posts);

        return view('blog.tag')->withCategories($categories)->withTag($tag)->withPosts($posts);

    }
}

?>
