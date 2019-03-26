<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Http\Requests\Backend\Auth\User\ManageUserRequest;
use App\Repositories\Backend\Auth\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class UserTableController extends Controller
{
    /**
     * @var UserRepository
     */
    private $users;

    /**
     * UserTableController constructor.
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function __invoke(ManageUserRequest $request)
    {
        try {
            return datatables()->of($this->users->getForDatatable($request->trashed,$request->status))
                ->escapeColumns('actions')
                ->addColumn('roles', function($user){
                    return $user->roles_label;
                })
                ->addColumn('actions',function($user){
                    return $user->action_buttons;
                })
                ->toJson();
        } catch (\Exception $e) {
            Log::error("Users/Table".$e->getMessage());
        }
    }
}
