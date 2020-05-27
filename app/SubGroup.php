<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubGroup extends Model
{
    protected $table = 'subgroups';

    public function group() {
        return $this->belongsTo(Group::class, 'parentGroupId', 'id');
    }
}
