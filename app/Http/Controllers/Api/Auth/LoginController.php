<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\Auth\Traits\AuthenticateApiUser;
use App\Repositories\Api\Auth\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{
    use AuthenticateApiUser;
    /**
     * @var UserRepository
     */
    private $users;

    /**
     * LoginController constructor.
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users)
    {
        $this->middleware('guest');
        $this->users = $users;
    }

    public function postLogin(Request $request)
    {
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required'
        ]);

        return $this->getAuthToken($request);
    }
}
