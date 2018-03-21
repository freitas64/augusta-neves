<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Ensinos;
use App\Manuais;
use Illuminate\Http\Request;
use Image;
use Purifier;
use Session;

use Validator;
use Illuminate\Support\Facades\Input;



class ManuaisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['showList']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all the blog post in it form the database
        $manuais = Manuais::orderBy('id', 'desc')->paginate(4);

        // return a view and pass in the above variable
        return view('manuais.index')->withManuais($manuais);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ensinos = Ensinos::all();
        return view('manuais.create')->withEnsinos($ensinos);
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

        $rules = array(
            'title' => 'required|max:255|unique:manuais,title'

        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            Session::flash('error', 'Nome do manual já existe!!');

            return redirect()->to(app('url')->previous());

        }

        else {
            $this->validate($request, [
                'title' => 'required|max:255',
                'ensino_id' => 'required|integer',
                'linkManual' => 'nullable|max:300',
                'featured_img' => 'required|image'
            ]);
            //Guardar na BD
            $manual = new Manuais();
            $titleUpper = mb_strtoupper($request->title);
            $manual->title = $titleUpper;
            $manual->info = $request->info;
            $manual->linkManual = $request->linkManual;
            $manual->ensino_id = $request->ensino_id;

            //Store image
            if ($request->hasFile('featured_img')) {
                $image = $request->file('featured_img');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $img_manual = Image::make($image);
                $img_manualAdmin = Image::make($image);
                $img_manual->resize(356, 434, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img_manualAdmin->resize(89, 109, function ($constraint) {
                    $constraint->aspectRatio();
                });

                //Backgrou color #e8e8e8

                $img_manual->resizeCanvas(356, 434, 'center', false, '#ffffff');
                $img_manualAdmin->resizeCanvas(89, 109, 'center', false, '#ffffff');

                $img_manual->save(public_path('images/Manuais/manual_' . $filename));
                $img_manualAdmin->save(public_path('images/Manuais/manualAdmin_' . $filename));

                $manual->image = $filename;
            }

            $manual->save();


            Session::flash('success', 'Manual criado com sucesso');


            //redirect para algum lado

            return redirect()->route('manuais.show', $manual->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manuais  $manuais
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $manuais = Manuais::find($id);
        return view('manuais.show')->withManuais($manuais);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manuais  $manuais
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // encontrar o post na BD e guardar como uma var
        $manual = Manuais::find($id);
        $ensinos = Ensinos::all();
        $ens = [];


        foreach ($ensinos as $ensino) {
            $ens[$ensino->id] = $ensino->name;
        }
        // retornar a vista e passar a variávivel que sacamos da BD
        return view('manuais.edit')->withManuais($manual)->withEnsinos($ens);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manuais  $manuais
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $manuais = Manuais::find($id);

        // Validar o formulario

        $this->validate($request, [
            'title'         => 'required|max:255',
            'ensino_id'   => 'required|integer',
            'linkManual' => 'nullable|max:300',
            'featured_img'  => 'image'

        ]);

        //Guardar na BD


        $titleUpper =  mb_strtoupper($request->title);
        $manuais->title = $titleUpper;
        $manuais->info = $request->info;
        $manuais->ensino_id = $request->ensino_id;
        $manuais->linkManual = $request->linkManual;

        //Store image
        if ($request->hasFile('featured_img')) {
            $image = $request->file('featured_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $img_manual = Image::make($image);
            $img_manualAdmin = Image::make($image);

            $img_manual->resize(356, 434, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_manualAdmin->resize(89, 109, function ($constraint) {
                $constraint->aspectRatio();
            });

            //Backgrou color #e8e8e8

            $img_manual->resizeCanvas(330, 273, 'center', false, '#ffffff');
            $img_manual->resizeCanvas(89, 109, 'center', false, '#ffffff');
            $img_manual->save(public_path('images/Manuais/manual_' . $filename));
            $img_manualAdmin->save(public_path('images/Manuais/manualAdmin_' . $filename));
            $old_filename = $manuais->image;

            Storage::delete("Manuais/manual_".$old_filename);
            Storage::delete("Manuais/manualAdmin_".$old_filename);


            $manuais->image = $filename;


        }

        $manuais->save();



        // set flash sucess message
        Session::flash('success', 'Manual alterado com sucesso!');

        // redirect com o session flash to manuais.show
        return redirect()->route('manuais.show', $manuais->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manuais  $manuais
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $manuais = Manuais::find($id);

        Storage::delete("Manuais/manual_".$manuais->image);
        Storage::delete("Manuais/manualAdmin_".$manuais->image);

        $manuais->delete();

        Session::flash('success', 'O Manual foi apagado com sucesso');
        return redirect()->route('manuais.index');
    }


}
