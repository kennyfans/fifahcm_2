<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | User Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles user
    |
    */

    protected $userRepository;

    function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
    }

    public function getInfo(){
        return view('frontend.users.info');
    }

    public function postInfo(Request $request){
        $this->validate($request, [
            'name'              => 'required',
            'email'             => 'required|email|unique:users,email,'.Auth::user()->id,
            'identity_number'   => 'required|numeric|unique:users,identity_number,'.Auth::user()->id,
        ]);

        $update = [
            'name'  =>  $request->get('name'),
            'email'  =>  $request->get('email'),
        ];

        if( Auth::user()->canUpdateIdentity() ){
            $update['identity_number'] = $request->get('identity_number');
        }

        $this->userRepository->update($update, Auth::user()->id);

        Flash::overlay('Bạn đã cập nhật thành công.', 'Thông báo');
        return redirect()->back();

    }


}
