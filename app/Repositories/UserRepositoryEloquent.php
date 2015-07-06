<?php

namespace App\Repositories;

use Carbon\Carbon;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\User;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }

    /**
     * Find user by facebook id
     * @param $facebookId
     * @return mixed
     */
    public function findByFacebookId($facebookId)
    {
        return $this->findByField('facebook_id', $facebookId)->first();
    }

    /**
     * Create user from facebook provider
     * @param $facebookData
     * @return mixed
     */
    public function createUserFromFacebook($facebookData)
    {
        return $this->create([
            'name'  =>  $facebookData->getName(),
            'facebook_id'  =>  $facebookData->getId(),
            'email'  =>  $facebookData->getEmail(),
            'avatar'  =>  $facebookData->getAvatar(),
            'date_update'   =>  Carbon::now()->addDays(7),
        ]);
    }

    /**
     * Find a user by facebook key or create
     * @param $facebookId
     * @return mixed
     */
    public function findByFacebookIdOrCreate($facebookData)
    {

        $user = $this->findByFacebookId($facebookData->getId());
        if( empty($user) ){
            $user = $this->createUserFromFacebook($facebookData);
        }
        return $user;

    }
}