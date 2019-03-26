<?php

namespace App\Http\Controllers\Api\Auth;



use App\Repositories\Api\Auth\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Api\Auth\Traits\AuthenticateApiUser;

class RegisterController extends Controller
{

    use AuthenticateApiUser;
    /**
     * @var UserRepository
     */
    private $users;

    /**
     * RegisterController constructor.
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function postRegister(Request $request)
    {
        //Can add user type logic here determine which handler should be called.
        //$type = $request->user_type;
        return $this->handleRegister($request);
    }

    private function handleRegister($request)
    {
        //Validate details
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|min:10|max:12|unique:people',
            'password' => 'required',
        ]);
        //Create user
        $user = $this->users->create($request->all());
        //Return session token
        return $this->getAuthToken($request,$request->phone,$request->password);
    }
}
