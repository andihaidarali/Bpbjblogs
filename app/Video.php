<?php

namespace BPBJ;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'vidgal_id', 'video_title', 'filename', 'file_size', 'file_mime',
    ];
    public function vidgals()
    {
        return $this->belongsTo('BPBJ\Vidgal', 'vidgal_id');
    }
}
