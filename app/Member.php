<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    public function getActiveMember() {
        return $this->where('status', 'active');
    }
}
