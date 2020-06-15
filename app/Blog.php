<?php

namespace BPBJ;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'slug', 'images', 'post_content',
    ];
}
