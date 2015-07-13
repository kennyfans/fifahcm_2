<?php

namespace App\Http\Controllers;

use App\Criteria\AvaiableEventCriteria;
use App\Repositories\EventRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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

    function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
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


}
