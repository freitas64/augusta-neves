<?php

namespace App\Http\Controllers;

use App\Slideshow;
use Illuminate\Http\Request;
use Image;
use Purifier;
use Session;
use Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;



class SlideshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slideshow = Slideshow::orderBy('id', 'asc')->paginate(3);



        // return a view and pass in the above variable
        return view('slideshow.index')->withSlideshow($slideshow);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $slideshow = Slideshow::all();
        return view('slideshow.create')->withSlideshow($slideshow);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // DIE AND DUMP - MUITO BOM
        //dd($request);
        //Validar os dados
        $this->validate($request, [
            'imagem' => 'required|image'
        ]);
        //Guardar na BD
        $slideshow = new Slideshow();


        //Store image
        if ($request->hasFile('imagem')) {
            $image = $request->file('imagem');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $img_slideshow = Image::make($image);
            $img_slideshowAdmin = Image::make($image);


            $img_slideshow->resize(1171,441, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_slideshowAdmin->resize(585, 221, function ($constraint) {
                $constraint->aspectRatio();
            });


            //Backgrou color #e8e8e8
            $img_slideshow->resizeCanvas(1171, 441, 'center', false, '#ffffff');
            $img_slideshowAdmin->resizeCanvas(585, 221, 'center', false, '#ffffff');

            $img_slideshow->save(public_path('images/Slideshow/slideshow_'.$filename));
            $img_slideshowAdmin->save(public_path('images/Slideshow/slideshowAdmin_' . $filename));


            $slideshow->image = $filename;
        }

        $slideshow->save();


        Session::flash('success', 'Imagem inserida com sucesso');


        //redirect para algum lado

        return redirect()->route('slideshow.index');
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
    public function edit($id)
    {
        // encontrar o post na BD e guardar como uma var
        $slideshow = Slideshow::find($id);

        // retornar a vista e passar a variávivel que sacamos da BD
        return view('slideshow.edit')->withSlideshow($slideshow);

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
        //dd($request->tags);
        $slideshow = Slideshow::find($id);
        // Validar o formulario

        $this->validate($request, [
            'featured_img'  => 'image'
        ]);

        // GUardar o form na BD


        //Store image
        if ($request->hasFile('featured_img')) {
            $image = $request->file('featured_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $img_slideshow = Image::make($image);
            $img_slideshowAdmin= Image::make($image);



            $img_slideshow->resize(1171, 441, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_slideshowAdmin->resize(585, 221, function ($constraint) {
                $constraint->aspectRatio();
            });


            //Backgrou color #e8e8e8
            $img_slideshow->resizeCanvas (1171,441,'center',false,'#ffffff');
            $img_slideshowAdmin->resizeCanvas(585, 221, 'center', false, '#ffffff');

            $img_slideshow->save(public_path('images/Slideshow/slideshow_' . $filename));
            $img_slideshowAdmin->save(public_path('images/Slideshow/slideshowAdmin_' . $filename));


            $old_filename = $slideshow->image;

            $slideshow->image = $filename;


            File::Delete((public_path('images/Slideshow/slideshow_'.$old_filename)));
            File::Delete((public_path('images/Slideshow/slideshowAdmin_'.$old_filename)));
        }

        $slideshow->save();



        // set flash sucess message
        Session::flash('success', 'Imagem alterada com sucesso!');

        // redirect com o session flash to post.show
        return redirect()->route('slideshow.index');
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
        $slideshow = Slideshow::find($id);

        File::Delete((public_path('images/Slideshow/slideshow_'.$slideshow->image)));

        File::Delete((public_path('images/Slideshow/slideshowAdmin_'.$slideshow->image)));
        $slideshow->delete();
        Session::flash('success', 'A Imagem foi apagada com sucesso');
        return redirect()->route('slideshow.index');
    }
}
