<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    //
    protected $table = 'venue';
    protected $fillable = ['nama','slug_venue','harga','gambar'];
}
