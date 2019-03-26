<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 4/4/18
 * Time: 2:46 AM
 */

namespace App\Repositories\Api\Locale;


use App\Models\Locale\County;
use App\Repositories\BaseRepository;

class CountyRepository extends BaseRepository
{

    /**
     * Specify Model class name.
     *
     * @return mixed
     */
    public function model()
    {
        return County::class;
    }

    public function getAll()
    {
        return $this->all();
    }
}