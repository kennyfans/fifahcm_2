<?php

namespace App\Repositories;

use Carbon\Carbon;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Event;

/**
 * Class EventRepositoryEloquent
 * @package namespace App\Repositories;
 */
class EventRepositoryEloquent extends BaseRepository implements EventRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Event::class;
    }

    /**
     * get avaiable events
     * @return mixed
     */
    public function getAvaiable()
    {
        return $this->findWhere([
            'is_active' => 1
        ]);
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }

    /**
     * get event by slug
     * @return mixed
     */
    public function getBySlug($slug)
    {
        return $this->findByField('slug', $slug)->first();
    }
}