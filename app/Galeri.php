<?php

namespace BPBJ;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeris';
    
    public function images()
    {
        return $this->hasMany('BPBJ\Image');
    }
}
