<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 4/1/18
 * Time: 9:17 AM
 */

namespace App\Repositories\Api\Citizens;


use App\Models\People\Citizen;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class CitizenRepository extends BaseRepository
{

    /**
     * Specify Model class name.
     *
     * @return mixed
     */
    public function model()
    {
        return Citizen::class;
    }
}