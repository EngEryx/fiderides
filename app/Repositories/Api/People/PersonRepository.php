<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 3/29/18
 * Time: 8:25 PM
 */

namespace App\Repositories\Api\People;


use App\Models\People\Person;
use App\Repositories\BaseRepository;

/**
 * Class PersonRepository
 * @package App\Repositories\Api\People
 */
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