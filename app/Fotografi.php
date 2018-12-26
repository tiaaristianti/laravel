<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Fotografi;
use App\User;

class Fotografi extends Model
{
    //
    
        protected $table = 'foto';
        protected $fillable = ['user_id','nama','slug_foto','harga','gambar'];

        public function user(){
            return $this->belongsTo(User::class);
        }

}
