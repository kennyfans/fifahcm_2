<?php

namespace App\Http\Controllers;

use App\Criteria\AvaiableEventCriteria;
use App\Criteria\ShowEventCriteria;
use App\Criteria\ShowFinishEventCriteria;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\EventRepository;
use App\Repositories\UserRepository;
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

    protected $userRepository;

    function __construct(EventRepository $eventRepository, UserRepository $userRepository)
    {
        $this->eventRepository = $eventRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Show index page
     */
    public function getIndex(){
        $events = $this->eventRepository->getByCriteria(new ShowEventCriteria())->all();
        $oldEvents = $this->eventRepository->getByCriteria(new ShowFinishEventCriteria())->all();

        return view('frontend.home', compact('events','oldEvents'));
    }

    public function getRule(){
        return view('frontend.rule');
    }


}
