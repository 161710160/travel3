<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['nama_wisata'];
    public $timestamps  = true;

        public function travel()
        {
            return $this->hasMany('App\Travel' , 'kategori_id');
        }
}
