<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Event extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'events';

    protected $fillable = [
        'name',
        'slug',
        'table_event',
        'table_form',
        'thumb',
        'date_start',
        'date_end',
        'is_active'
    ];


}
