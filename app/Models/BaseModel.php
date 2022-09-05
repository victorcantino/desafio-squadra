<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected const STATUS_ATIVO = 1;

    protected $attributes = [
        'status' => self::STATUS_ATIVO,
    ];
    public $timestamps = false;
}
