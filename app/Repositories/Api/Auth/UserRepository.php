<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 3/29/18
 * Time: 8:24 PM
 */

namespace App\Repositories\Api\Auth;


use App\Exceptions\GeneralException;
use App\Models\Auth\User;
use App\Repositories\Api\Citizens\CitizenRepository;
use App\Repositories\Api\People\PersonRepository;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository
{

    /**
     * UserRepository constructor.
     * @param PersonRepository $people
     * @param CitizenRepository $citizens
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Specify Model class name.
     *
     * @return mixed
     */
    public function model()
    {
        return User::class;
    }

    public function create(array $data) : User
    {
        return DB::transaction(function() use($data){
            $user = parent::create([
                'person_type' => '2',
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'active' => isset($data['active']) && $data['active'] == '1' ? 1 : 0,
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed' => isset($data['confirmed']) && $data['confirmed'] == '1' ? 1 : 0,
            ]);
            if ($user) {
                //Set User
//                $data['user_id'] = $user->id;
//                $person = $this->people->create(array_only($data,[
//                    'phone','national_id','email','user_id'
//                ]));
//                $this->citizens->create([
//                    'people_id' => $person->id,
//                ]);
                //TODO: Attach default roles.
                return $user;
            }
            throw  new GeneralException(__('exceptions.api.user_create_error'));
        });
    }

    public function findUserEmailByDetail($detail_field)
    {
        //Login by phone or national ID.
        $_qry = $this->people->model->query()->where('phone',$detail_field)->orWhere('national_id',$detail_field);
        if($_qry->exists())
            return $_qry->first()->user->email;
        return null;
    }
}