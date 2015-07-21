<?php

namespace App\Http\Controllers;

use App\Criteria\AvaiableEventCriteria;
use App\Criteria\ShowFinishEventCriteria;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\EventRepository;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class EventController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Home page controller
    |--------------------------------------------------------------------------
    |
    | This controller handles event
    |
    */

    protected $eventRepository;

    protected $userRepository;

    function __construct(EventRepository $eventRepository, UserRepository $userRepository)
    {
        $this->eventRepository = $eventRepository;
        $this->userRepository = $userRepository;
    }

    public function getDetail( $slug ){

        $event = $this->eventRepository->getBySlug($slug);

        if( $event ){

            $check = $this->eventRepository->getByCriteria(new AvaiableEventCriteria())->where('slug',$slug)->first();
            $view = $event->table_form;
            $formData = DB::table($event->table_form)->get();
            $userData = ( Auth::check() ) ? (array) DB::table($event->table_event)->where('user_id', Auth::user()->id)->first() : false;

            return view('frontend.events.'.$view, compact('event', 'formData', 'userData', 'check'));
        }else{
            return redirect('/');
        }


    }

    public function postJoin(Request $request, $slug){

        $event = $this->eventRepository->getBySlug($slug);

        if( $event ){
            $check = $this->eventRepository->getByCriteria(new AvaiableEventCriteria())->where('slug',$slug)->first();
            $fieldInput = json_decode($event->field_result, true);
            $data = [];
            foreach( $fieldInput as $input ){
                $data[$input] = $request->get($input, 0);
            }

            if( Auth::check() ){
                if( $check ){
                    $record = DB::table($event->table_event)->where('user_id', Auth::user()->id)->get();

                    $data['updated_at'] = Carbon::now();
                    if( !$record ){
                        $data['user_id']    =   Auth::user()->id;
                        $data['created_at'] = Carbon::now();
                        $joinEvent = DB::table($event->table_event)->insert($data);
                    }else{
                        $joinEvent = DB::table($event->table_event)->where('user_id', Auth::user()->id)->update($data);
                    }

                    if( $joinEvent ){
                        Flash::overlay('Bạn đã dự đoán thành công.', 'Thông báo');
                    }else{
                        Flash::overlay('Có lỗi trong quá trình dự đoán. Vui lòng thử lại', 'Lỗi');
                    }
                }else{
                    Flash::overlay('Sự kiện này đã hết thời gian dự đoán.', 'Thông báo');    
                }
            }
            return redirect(route('eventDetail', $event->slug));

        }else{
            return redirect('/');
        }

    }


    public function getResult($slug){
        $this->eventRepository->pushCriteria(new ShowFinishEventCriteria());
        $event = $this->eventRepository->getBySlug($slug);

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

    public function getResultDetail($slug, $userId){

        // check event avaiable
        $this->eventRepository->pushCriteria(new ShowFinishEventCriteria());
        $event = $this->eventRepository->getBySlug($slug);
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

        return view('frontend.result.resultDetail_'.$event->id, compact('event', 'user','result','userResult','formData'));
        
    }


}
