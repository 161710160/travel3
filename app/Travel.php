<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $fillable = ['tempat_wisata','artikel','kategori_id'];
    public $timestamps  = true;

        public function kategori()
        {
            return $this->belongsTo('App\Kategori' , 'kategori_id');
        }
}
