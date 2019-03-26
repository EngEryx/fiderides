<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 4/5/18
 * Time: 4:16 AM
 */

namespace App\Repositories\Api\Crime;


use App\Models\Auth\Role;
use App\Models\Crime\Crime;
use App\Models\Crime\CrimeVerification;
use App\Repositories\Api\Locale\CountyRepository;
use App\Repositories\Api\Tags\TagRepository;
use App\Repositories\Backend\Crime\TagCrimeRepository;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CrimeRepository extends BaseRepository
{
    /**
     * @var CountyRepository
     */
    private $county;
    /**
     * @var CrimeStatisticRepository
     */
    private $statistic;
    /**
     * @var CrimeVerificationRepository
     */
    private $verification;
    /**
     * @var TagCrimeRepository
     */
    private $tagCrime;
    /**
     * @var TagRepository
     */
    private $tags;

    /**
     * CrimeRepository constructor.
     * @param CountyRepository $county
     * @param TagRepository $tags
     * @param CrimeStatisticRepository $statistic
     * @param CrimeVerificationRepository $verification
     * @param TagCrimeRepository $tagCrime
     */
    public function __construct(CountyRepository $county,
                                TagRepository $tags,
                                CrimeStatisticRepository $statistic,
                                CrimeVerificationRepository $verification,
                                TagCrimeRepository $tagCrime)
    {
        parent::__construct();
        $this->county = $county;
        $this->statistic = $statistic;
        $this->verification = $verification;
        $this->tagCrime = $tagCrime;
        $this->tags = $tags;
    }
    /**
     * Specify Model class name.
     *
     * @return mixed
     */
    public function model()
    {
        return Crime::class;
    }

    public function create(array $input)
    {
        return DB::transaction(function() use ($input){
            $input['date'] = Carbon::now();
            $input['people_id'] = auth()->user()->person->id;
            $crime = parent::create(array_except($input,'tags'));
            $tags = collect(explode("#", $input['tags']));
            $county = $this->county->where('name', $tags->first())->first();
            $tags = str_contains($tags->last(),',') ? explode(',', $tags->last()) : collect($tags->last())->toArray();
            if(!is_null($county)){
                $crime->county_id = $county->id;
                $crime->save();
            }
            //attach tags
            $crime->tags = $tags;
            $crime->save();
            foreach ($tags as $item){

                $record = $this->tags->getFirstOrCreate($item);
                if ($record)
                    $this->tagCrime->create(['crime_id' => $crime->id, 'tag_id' => $record->id]);
            }
            //stats + verifications
            $this->statistic->create(['crime_id'=>$crime->id]);
            $this->verification->create(['crime_id'=>$crime->id]);
            //refresh relationships
            $crime->load('crime_verification','crime_statistic');
            return $crime;
        });
    }

    public function getCrimeTags()
    {
        return $this->tags->all();
    }
}