<?php

namespace App\Models\Abstractions;

use Illuminate\Database\Eloquent\Model;

abstract class AEntity extends Model implements IEntity
{
    protected $primaryKey = 'id';
    protected $dates = ['create_at', 'update_at', 'delete_at'];
    protected $timestamps = true;
}