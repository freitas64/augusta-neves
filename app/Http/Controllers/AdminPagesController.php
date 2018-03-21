<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Event;
use Calendar;


class AdminPagesController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //Retorna a vista da Homepage
    public function getIndex(){
        $events = [];
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => '#ff0000',
                        'url' => route('event.show', $value->id) ,
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        return view('pages.admin.welcome',compact('calendar'));
    }

    //Retorna a vista do Acerca
    public function  getABout(){
        return view('pages.sobre');
    }

    //Retorna a vista do Contacto
    public function getContact(){
        return view('pages.contact');
    }

    //Retorna a vista do Portf�lio
    public function getPortfolio(){
        return view('pages.manuais');
    }
}

?>