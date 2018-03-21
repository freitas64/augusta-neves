<?php

namespace App\Http\Controllers;

use App\ContactsNewsletter;
use function PHPSTORM_META\elementType;
use Purifier;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class ContactsNewsletterController extends Controller
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
        //
        $contacts=ContactsNewsletter::orderBy('id', 'desc')->paginate(30);

        // return a view and pass in the above variable

        return view('contactsNewsletter.index')->withContacts($contacts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emails = ContactsNewsletter::all();
        return view('contactsNewsletter.create')->withEmails($emails);
    }


    public function store(Request $request)
    {
        $rules = array(
            'email' => 'required|unique:contactsNewsletter,email',
            'name'=>'required|max:255'

        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            Session::flash('error_message', 'Email inserido já existe!!');
            return redirect()->to(app('url')->previous(). '#contactbtn');


        }

        else {
            $contactNews = new ContactsNewsletter();
            $contactNews->email= $request->email;
            $contactNews->name = $request->name;
            $contactNews->save();
            // redirect to index in complete

            Session::flash('success_message', 'Subscrição efetuada com sucesso');
            return redirect()->to(app('url')->previous(). '#contactbtn');


        }






    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ensinos  $ensinos
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {

    }

    public function sendNewsletter()
    {
        return redirect()->route('manuais.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ensinos  $ensinos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ensino = Ensinos::find($id);
        return view('ensinos.edit')->withEnsino($ensino);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ensinos  $ensinos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ensinos  $ensinos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $contact = ContactsNewsletter::find($id);


        $contact->delete();
        \Session::flash('success', 'O contacto foi apagado com sucesso');
        return redirect()->route('contactsNewsletter.index');
    }
}
