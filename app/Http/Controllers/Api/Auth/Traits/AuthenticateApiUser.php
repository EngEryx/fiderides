<?php

namespace App\Http\Controllers\Api\Auth\Traits;

/**
 * Created by PhpStorm.
 * User: eric
 * Date: 12/7/17
 * Time: 12:41 PM
 */

use App\Models\Access\Api\OauthClient;
use App\Repositories\Api\Auth\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Client;

trait AuthenticateApiUser {

    /**
     * Attempt to authenticate Mobile Client.
     *
     * @param $request
     * @return mixed
     */
    public function getAuthToken($request, $username=null,$password=null)
    {
        $oauth_client = Client::where(["password_client"=>1])->get()->last();
        if(is_null($oauth_client)){
            return Response::json(['error'=>"The API Oauth Client for passport has not been set!"]);
        }
        $username = $this->getUserAuthField(is_null($username) ? $request->username : $username);
        $params=[
            'grant_type'=>'password',
            'client_id'=> $oauth_client->id,
            'client_secret'=> $oauth_client->secret,
            'username'=> $username,
            'password'=>is_null($password) ? $request->password : $password,
            'scope'=>'*'
        ];

        $request->request->add($params);

        $proxy=Request::create('oauth/token','POST');

        return Route::dispatch($proxy);
    }

    /**
     * @param $login_detail
     * @return mixed
     */
    public function getUserAuthField($login_detail)
    {
        if(filter_var($login_detail,FILTER_VALIDATE_EMAIL))
            return $login_detail;
        //TODO: Find other login detail based on what the user has provided.
        return $this->users->findUserEmailByDetail($login_detail);
    }
}