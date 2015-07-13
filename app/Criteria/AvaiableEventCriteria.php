<?php
namespace App\Criteria;

use Carbon\Carbon;
use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;

class AvaiableEventCriteria implements CriteriaInterface {

    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->where('is_active','=', 1 )
                    ->where('date_finish','>=', Carbon::now() );
        return $model;
    }
}