<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{//demo user model

    protected $table = 'users';

    public function updateGifts($gifts, $type = '')
    {
        if (isset($gifts['gold'])) {
            $this->gold += $gifts['gold'];
        }

        $this->save();

        return $gifts;
    }
}
