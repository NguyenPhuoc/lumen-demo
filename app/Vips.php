<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vips extends Model
{
    protected $table = 'vips';

    protected $primaryKey = 'level';
}
