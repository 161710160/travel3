<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuliner extends Model
{
    protected $fillable = ['nama_kuliner','deskripsi','kategori_id'];
    public $timestamps  = true;
    
    public function kategori()
        {
            return $this->belongsTo('App\Kategori' , 'kategori_id');
        }
        public function galleri()
        {
            return $this->belongsToMany('App\galleri', 'babus', 'kuliner_id','galleri_id');
        }
}
