<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 4/5/18
 * Time: 7:30 AM
 */

namespace App\Repositories\Api\Crime;


use App\Models\Crime\CrimeVerification;
use App\Repositories\BaseRepository;

class CrimeVerificationRepository extends BaseRepository
{

    /**
     * Specify Model class name.
     *
     * @return mixed
     */
    public function model()
    {
        return CrimeVerification::class;
    }
}