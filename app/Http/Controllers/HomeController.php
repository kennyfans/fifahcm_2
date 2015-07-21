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
        $this->eventRepository->pushCriteria(new ShowEventCriteria());
        $events = $this->eventRepository->all();
        return view('frontend.home', compact('events'));
    }

    public function getRule(){
        return view('frontend.rule');
    }

    public function getResult($id){
        $this->eventRepository->pushCriteria(new ShowFinishEventCriteria());
        $event = $this->eventRepository->find($id);

        if( empty($event) ) {
            return redirect('/');
        }


        $results = DB::table($event->table_event)
            ->select($event->table_event.'.score',$event->table_event.'.updated_at','users.name',$event->table_event.'.id',$event->table_event.'.user_id')
            ->where($event->table_event.'.id', '!=', 1)
            ->join('users', 'users.id', '=', $event->table_event.'.user_id')
            ->orderBy($event->table_event.'.score', 'desc')
            ->orderBy($event->table_event.'.updated_at', 'asc')
            ->get();

        return view('frontend.result.tmpResult', compact('event','results'));

    }

    public function getResultDetail($id, $userId){

        // check event avaiable
        $this->eventRepository->pushCriteria(new ShowFinishEventCriteria());
        $event = $this->eventRepository->find($id);
        if( empty($event) ) {
            return redirect('/');
        }

        // check user avaiable
        $user = $this->userRepository->find($userId);
        if( empty($user) ) {
            return redirect('/');
        }

        $formData = DB::table($event->table_form)->get();

        // get result
        $results = DB::table($event->table_event)->whereIn('user_id', [0,$user->id])->get();
        $result = $results[0];
        $userResult = $results[1];

        return view('frontend.result.resultDetail_'.$id, compact('event', 'user','result','userResult','formData'));
        
    }


}
