<?php

namespace BPBJ;

use Illuminate\Database\Eloquent\Model;

class Sopdoc extends Model
{
    protected $fillable = [
        'sop_id', 'doc_title', 'filename', 'file_size', 'file_mime',
    ];
    public function sops()
    {
        return $this->belongsTo('BPBJ\Sop', 'sop_id');
    }
}