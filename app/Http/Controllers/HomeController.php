<?php

namespace App\Http\Controllers;

use App\Criteria\AvaiableEventCriteria;
use App\Criteria\ShowEventCriteria;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\EventRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Home page controller
    |--------------------------------------------------------------------------
    |
    | This controller handles homepage
    |
    */

    protected $eventRepository;

    function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * Show index page
     */
    public function getIndex(){
        $this->eventRepository->pushCriteria(new ShowEventCriteria());
        $events = $this->eventRepository->all();
        return view('frontend.home', compact('events'));
    }

    public function getRule(){
        return view('frontend.rule');
    }

    public function getResult($id){


        if( !Schema::hasTable('event_'.$id) ){
            
            return redirect('/');

        }   

        $results = DB::table('event_'.$id)
            ->select('event_1.score','event_1.updated_at','users.name')
            ->where('event_1.id', '!=', 1)
            ->join('users', 'users.id', '=', 'event_1.user_id')
            ->orderBy('event_1.score', 'desc')
            ->orderBy('event_1.updated_at', 'asc')
            ->get();

        return view('frontend.result.tmpResult', compact('results'));



    }

}
