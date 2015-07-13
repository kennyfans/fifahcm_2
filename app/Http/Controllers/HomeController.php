<?php

namespace App\Http\Controllers;

use App\Criteria\AvaiableEventCriteria;
use App\Criteria\ShowEventCriteria;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\EventRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

}
