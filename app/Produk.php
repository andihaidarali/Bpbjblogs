<?php

namespace BPBJ;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'nama_produk', 'filename',
    ];
}
