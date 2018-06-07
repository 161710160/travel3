<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infopraktis extends Model
{
    protected $fillable = ['deskripsi','photos'];
    public $timestamps  = true;
}
