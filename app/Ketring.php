<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ketring;

class Ketring extends Model
{
    //
    protected $table = 'ketring';
    protected $fillable = ['nama','slug_ketring','harga','gambar'];
}
