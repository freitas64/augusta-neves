<?php
/**
 * Created by PhpStorm.
 * User: MyDooM_Portatil
 * Date: 15/07/2017
 * Time: 16:32
 */
namespace App\Http\Controllers;

use App\Category;
use App\FormacaoGaleria;
use App\Slideshow;
use App\Sobre;
use App\Ensinos;
use App\Manuais;
use App\Post;
use Illuminate\Support\Facades\Session;
use Mail;
use Illuminate\Http\Request;

class PagesController extends Controller{
    //Retorna a vista da Homepage
    public function getIndex(){
        $posts = Post::orderBy('id', 'desc')->paginate(6);
        $categories = Category::all();
        $about =  Sobre::all();
        $last = Post::orderBy('id', 'desc')->take(3)->get();

        $slideshow= Slideshow::orderBy('id', 'desc')->get();

        return view('pages.welcome')->withPosts($posts)->withCategories($categories)->withAbout($about)
            ->withLast($last)->withSlideshow($slideshow);
    }

    //Retorna a vista do Acerca
    public function  getABout(){
        $about= Sobre::first(); //retorna apenas um
        return view('pages.about')->withAbout($about);
    }

    //Retorna a vista do Contacto
    public function getContact(){
        return view('pages.contact');
    }

    //Retorna a vista do Portfólio
    public function getPortfolio(){

        $manuais= Manuais::all();
        $ensinos = Ensinos::all();
        return view('pages.manuais')->withManuais($manuais)->withEnsinos($ensinos);
    }

    public function getFormacaoGaleria(){
        $formacaoImagens = FormacaoGaleria::orderBy('id', 'desc')->paginate(6);
        return view('pages.galeriaFormacao')->with(compact('formacaoImagens'));
    }

    public function postContact(Request $request){

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required|min:3',
            'bodyMessage' => 'required|min:10'
        ]);


        $data = array (
            'name' => mb_strtoupper($request->name),
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->bodyMessage,

        );
        //dd($data);

        Mail::send('emails.contact',$data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('miguel41fcp@gmail.com');
            $message->subject($data['subject']);


        });

        Session::flash('success', 'Contacto enviado com sucesso');
        return view('pages.contact');
    }
}

?>