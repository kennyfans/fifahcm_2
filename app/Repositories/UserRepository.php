<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepository
 * @package namespace App\Repositories;
 */
interface UserRepository extends RepositoryInterface
{

    /**
     * Create user from facebook provider
     * @param $facebookData
     * @return mixed
     */
    public function createUserFromFacebook($facebookData);
    
    /**
     * Find user by facebook id
     * @param $facebookId
     * @return mixed
     */
    public function findByFacebookId($facebookId);

    /**
     * Find a user by facebook key or create
     * @param $facebookId
     * @return mixed
     */
    public function findByFacebookIdOrCreate($facebookData);
}
