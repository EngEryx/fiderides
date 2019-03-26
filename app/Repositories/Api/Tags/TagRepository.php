<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 4/7/18
 * Time: 12:17 AM
 */

namespace App\Repositories\Api\Tags;


use App\Models\Crime\Tag;
use App\Repositories\BaseRepository;

class TagRepository  extends BaseRepository
{

    /**
     * Specify Model class name.
     *
     * @return mixed
     */
    public function model()
    {
        return Tag::class;
    }

    public function getFirstOrCreate($item)
    {
        $qry = $this->model->query()->where('tag_name', $item);
        if($qry->exists())
            return $qry->first();
        return $this->create(['tag_name' => $item]);
    }
}