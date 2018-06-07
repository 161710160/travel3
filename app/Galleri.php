<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galleri extends Model
{
    protected $fillable = ['photos'];
    public $timestamps = true;
}
