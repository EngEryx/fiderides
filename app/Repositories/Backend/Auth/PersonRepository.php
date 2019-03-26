<?php
/**
 * Created by PhpStorm.
 * User: jruita
 * Date: 04/04/18
 * Time: 01:25
 */

namespace app\Repositories\Backend\Auth;


use App\Models\People\Person;
use App\Repositories\BaseRepository;

class PersonRepository extends BaseRepository
{

    /**
     * Specify Model class name.
     *
     * @return mixed
     */
    public function model()
    {
        return Person::class;
    }
}