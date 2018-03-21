<?php

namespace App\Http\Controllers;

use App\FormacaoGaleria;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Image;
use Purifier;
use Session;
use Illuminate\Support\Facades\File;
use Validator;


class FormacaoGaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $imagens = FormacaoGaleria::orderBy('id', 'desc')->paginate(6);

        // return a view and pass in the above variable
        return view('formacaoGaleria.index')->with(compact('imagens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formacaoGaleria.create');
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
            'title' => 'required|max:255',
            'date' => 'required|date',
            'featured_img' => 'required|image|max:2000',
            'formacaoLocal'=> 'nullable|max:300'
        ]);

        //Guardar na BD
        $imagem= new FormacaoGaleria();
        $titleUpper = mb_strtoupper($request->title);

        $imagem->title = $titleUpper;
        $imagem->date = $request->date;
        $imagem->formacaoLocal = $request->formacaoLocal;


        //Store image
        if ($request->hasFile('featured_img')) {
            $image = $request->file('featured_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $img_formacao = Image::make($image);
            $img_formacao_admin = Image::make($image);
            $img_formacao->resize(521, 319, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_formacao_admin->resize(261, 160, function ($constraint) {
                $constraint->aspectRatio();
            });

            //Backgrou color #e8e8e8

            $img_formacao->resizeCanvas(521, 319, 'center', false, '#ffffff');
            $img_formacao_admin->resizeCanvas(261, 160, 'center', false, '#ffffff');

            $img_formacao->save(public_path('images/Formacoes/formacao_'. $filename));
            $img_formacao_admin->save(public_path('images/Formacoes/formacaoAdmin_'.$filename));

            $imagem->image = $filename;

            $imagem->save();



            Session::flash('success', 'Imagem inserida com sucesso');


            //redirect para algum lado
            return redirect()->route('formacaoGaleria.index');
            //return redirect()->route('manuais.show', $imagem->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FormacaoGaleria  $formacaoGaleria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formacao_imagem = FormacaoGaleria::find($id);
        return view('formacaoGaleria.show')->with(compact('formacao_imagem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FormacaoGaleria  $formacaoGaleria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // encontrar o post na BD e guardar como uma var
        $formacaoImagem = FormacaoGaleria::find($id);


        // retornar a vista e passar a variávivel que sacamos da BD
        return view('formacaoGaleria.edit')->with(compact('formacaoImagem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FormacaoGaleria  $formacaoGaleria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $formacaoImagem = FormacaoGaleria::find($id);

        // Validar o formulario

        $this->validate($request, [
            'title' => 'required|max:255',
            'date' => 'required|date',
            'featured_img' => 'image',
            'formacaoLocal' => 'nullable|max:300'
        ]);

        //Guardar na BD


        $titleUpper =  mb_strtoupper($request->title);
        $formacaoImagem->title = $titleUpper;
        $formacaoImagem->date = $request->date;
        $formacaoImagem->formacaoLocal = $request->formacaoLocal;
        if ($request->hasFile('featured_img')) {
            $image = $request->file('featured_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();

        $img_formacao = Image::make($image);
        $img_formacao_admin = Image::make($image);
        $img_formacao->resize(521, 319, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img_formacao_admin->resize(261, 160, function ($constraint) {
            $constraint->aspectRatio();
        });

            //Backgrou color #e8e8e8

        //Backgrou color #e8e8e8

        $img_formacao->resizeCanvas(521, 319, 'center', false, '#ffffff');
        $img_formacao_admin->resizeCanvas(261, 160, 'center', false, '#ffffff');

        $img_formacao->save(public_path('images/Formacoes/formacao_'.$filename));
        $img_formacao_admin->save(public_path('images/Formacoes/formacaoAdmin_'.$filename));


            $old_filename = $formacaoImagem->image;
            $formacaoImagem->image = $filename;



            Storage::delete("Formacoes/formacaoAdmin_".$old_filename);
            Storage::delete("Formacoes/formacao_".$old_filename);



        }

        $formacaoImagem->save();



        // set flash sucess message
        Session::flash('success', 'Imagem alterada com sucesso!');

        // redirect com o session flash to manuais.show
        return redirect()->route('formacaoGaleria.show', $formacaoImagem->id);
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FormacaoGaleria  $formacaoGaleria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $formacao_imagem = FormacaoGaleria::find($id);
        Storage::delete("Formacoes/formacaoAdmin_".$formacao_imagem->image);
        Storage::delete("Formacoes/formacao_".$formacao_imagem->image);

        $formacao_imagem->delete();
        Session::flash('success', 'A imagem foi apagada com sucesso');
        return redirect()->route('formacaoGaleria.index');
    }
}
