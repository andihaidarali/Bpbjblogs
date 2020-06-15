<?php

namespace BPBJ;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'galeri_id', 'filename', 'file_size', 'file_mime',
    ];
    public function galeri()
    {
        return $this->belongsTo('BPBJ\Galeri', 'galeri_id');
    }
}
