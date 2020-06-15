<?php

namespace BPBJ;

use Illuminate\Database\Eloquent\Model;

class Vidgal extends Model
{
    protected $table = 'vidgals';
    
    public function videos()
    {
        return $this->hasMany('BPBJ\Video');
    }
}
