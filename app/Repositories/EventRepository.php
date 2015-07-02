<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface EventRepository
 * @package namespace App\Repositories;
 */
interface EventRepository extends RepositoryInterface
{
    /**
     * get avaiable events
     * @return mixed
     */
    public function getAvaiable();

    /**
     * get event by slug
     * @return mixed
     */
    public function getBySlug($slug);

}
