<?php

namespace App\Http\Controllers;

use App\Sobre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use Purifier;
use Session;
use Input;


class SobreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = Sobre::all();

        // return a view and pass in the above variable
        return view('sobre.index')->withAbout($about);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('sobre.create');
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

            'sobre' => 'required',
            'citacao' => 'max:255',
            'percursoA' => 'sometimes',
            'experienciaP' => 'sometimes',
            'featured_img' => 'sometimes|image'
        ]);
        //Guardar na BD
        $about = new About();

        $about->sobre = Purifier::clean($request->sobre);


        //Store image
        if ($request->hasFile('featured_img')) {
            $image = $request->file('featured_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $img_indexAbout = Image::make($image);
            $img_about = Image::make($image);
            $img_homeAbout = Image::make($image);

            $img_about->resize(472, 501, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img_indexAbout->resize(338, 348, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img_homeAbout->resize(320, 383, function ($constraint) {
                $constraint->aspectRatio();
            });


            //Backgrou color #e8e8e8
            $img_indexAbout->resizeCanvas(338, 348, 'center', false, '#ffffff');
            $img_homeAbout->resizeCanvas(320, 283, 'center', false, '#ffffff');
            $img_about->resizeCanvas(472, 501, 'center', false, '#ffffff');
            $img_indexAbout->save(public_path('images/indexAbout_' . $filename));
            $img_about->save(public_path('images/about_' . $filename));

            $about->image = $filename;
        }

        $about->save();


        Session::flash('success', 'Sobre criado com sucesso');


        //redirect para algum lado

        return redirect()->route('sobre.show', $about->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // encontrar o post na BD e guardar como uma var
        $about = Sobre::find($id);

        // retornar a vista e passar a variávivel que sacamos da BD
        return view('sobre.edit')->withAbout($about);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $about = Sobre::find($id);
        $this->validate($request, [

            'sobre' => 'required',
            'citacao' => 'max:255',
            'percursoA' => 'sometimes',
            'experienciaP' => 'sometimes',
            'featured_img' => 'sometimes|image'
        ]);
        //Guardar na BD


        $about->sobre = Purifier::clean($request->sobre);

        $about->citacao = $request->citacao;
        $about->percursoA = Purifier::clean($request->percursoA);
        $about->experienciaP = Purifier::clean($request->experienciaP);


        //Store image
        if ($request->hasFile('featured_img')) {
            $image = $request->file('featured_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $img_indexAbout = Image::make($image);
            $img_homeAbout = Image::make($image);
            $img_about = Image::make($image);

            $img_about->resize(472, 501, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img_homeAbout->resize(320, 283, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img_indexAbout->resize(338, 348, function ($constraint) {
                $constraint->aspectRatio();
            });


            //Backgrou color #e8e8e8
            $img_indexAbout->resizeCanvas(344, 354, 'center', false, '#ffffff');
            $img_homeAbout->resizeCanvas(320, 283, 'center', false, '#ffffff');
            $img_about->resizeCanvas(472, 501, 'center', false, '#ffffff');
            $img_indexAbout->save(public_path('images/Sobre/indexAbout_' . $filename));
            $img_about->save(public_path('images/Sobre/about_' . $filename));
            $img_homeAbout->save(public_path('images/Sobre/homeAbout_' . $filename));



                $old_filename = $about->image;

                $about->image = $filename;
                Storage::delete("Sobre/homeAbout_".$old_filename);
                Storage::delete("Sobre/indexAbout_".$old_filename);
                Storage::delete("Sobre/about_".$old_filename);

            }

            $about->save();



            // set flash sucess message
            Session::flash('success', 'Alterado com sucesso!');

            // redirect com o session flash to post.show
            return redirect()->route('sobre.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
