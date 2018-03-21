<?php

namespace App\Http\Controllers;

use App\EmailNewsletter;
use function GuzzleHttp\Psr7\copy_to_string;
use Illuminate\Http\Request;
use App\ContactsNewsletter;
use Purifier;
use Session;
use Image;
use Mail;
use Swift_Attachment;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class EmailNewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = EmailNewsletter::orderBy('id', 'desc')->paginate(30);

        // return a view and pass in the above variable
        return view('emailNewsletter.index')->with(compact('emails'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emails = ContactsNewsletter::all();
        return view('emailNewsletter.create')->withEmails($emails);
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
            'subject' => 'required|max:300',
            'body' => 'required',
            'file' => 'nullable',
        ]);
        //Guardar na BD
        $emailNewsletter = new EmailNewsletter();

        $emailNewsletter->subject = $request->subject;
        $emailNewsletter->body = Purifier::clean($request->input('body'));


        if($request->hasFile('file')){

            /* get File from Request */
        $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
        /* get File Extension */
        $extension = $file->getClientOriginalExtension();

        /* Your File Destination */
        $destination = 'images/FicheirosEmail';

        /* unique Name for file */
        $filename = uniqid().'.'.$extension;

        /* finally move file to your destination */
        $file->move($destination, $filename);

            $emailNewsletter->file = $filename;
    }

        $emailNewsletter->save();


        $emailNewsletter->contactsNewsletter()->sync($request->emails, false);

        $contacts = $emailNewsletter->ContactsNewsletter()->get();
        $subject = $request->subject;
        $content = Purifier::clean($request->input('body'));

        if (!$request->file == null)
        {

            $file = public_path(). "/images/FicheirosEmail/$filename";
            foreach($contacts as $t){

                Mail::send('emails.contactNewsletter', ['subject' => $subject, 'content' => $content], function ($message) use ($t,$file) {


                        $message->attach($file);
                        $message->from('geral@augusta-neves.net', 'Maria Augusta Neves');
                        $message->to($t->email);


                });

                Session::flash('success', 'Email enviado com sucesso');
                $emails = EmailNewsletter::orderBy('id', 'desc')->paginate(30);

                return view('emailNewsletter.index')->with(compact('emails'));

            }
        }else{

            foreach($contacts as $t){

                Mail::send('emails.contactNewsletter', ['subject' => $subject, 'content' => $content], function ($message) use ($t) {


                        $message->from('geral@augusta-neves.net', 'Maria Augusta Neves');
                        $message->to($t->email);



                });

                Session::flash('success', 'Email enviado com sucesso');
                $emails = EmailNewsletter::orderBy('id', 'desc')->paginate(30);

                return view('emailNewsletter.index')->with(compact('emails'));

            }
        }






    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmailNewsletter  $emailNewsletter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {



        $emails = EmailNewsletter::find($id);
        return view('emailNewsletter.show')->with(compact('emails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmailNewsletter  $emailNewsletter
     * @return \Illuminate\Http\Response
     */
   /** public function edit(EmailNewsletter $emailNewsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmailNewsletter  $emailNewsletter
     * @return \Illuminate\Http\Response
     */
   /** public function update(Request $request, EmailNewsletter $emailNewsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmailNewsletter  $emailNewsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $emailNewsletter = EmailNewsletter::find($id);
        $emailNewsletter->contactsNewsletter()->detach();
        if (!$emailNewsletter->file==null){
            Storage::delete("FicheirosEmail/".$emailNewsletter->file);
        }


        $emailNewsletter->delete();
        Session::flash('success', 'Email apagado com sucesso');
        return redirect()->route('emailNewsletter.index');
    }



}
