<?php

namespace BPBJ;

use Illuminate\Database\Eloquent\Model;

class Sop extends Model
{
    protected $table = 'sops';
    
    public function sopdocs()
    {
        return $this->hasMany('BPBJ\Sopdoc');
    }
}
