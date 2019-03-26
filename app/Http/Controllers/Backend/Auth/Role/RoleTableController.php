<?php

namespace App\Http\Controllers\Backend\Auth\Role;

use App\Repositories\Backend\Auth\RoleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class RoleTableController extends Controller
{
    /**
     * @var RoleRepository
     */
    private $roles;

    /**
     * RoleTableController constructor.
     * @param RoleRepository $roles
     */
    public function __construct(RoleRepository $roles)
    {
        $this->roles = $roles;
    }

    public function __invoke()
    {
        try {
            return datatables()->of($this->roles->with(['users'])->get())
                ->escapeColumns('actions', 'permissions')
                ->editColumn('users', function ($query){
                    return $query->users->count();
                })
                ->editColumn('permissions',function($query){
                    return $query->permissions_list;
                })
                ->addColumn('actions',function($query){
                    return $query->action_buttons;
                })
                ->toJson();
        } catch (\Exception $e) {
            Log::error("Roles/Table ".$e->getMessage());
        }
    }
}
