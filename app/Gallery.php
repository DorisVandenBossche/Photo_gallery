<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable=['name'];


    public function photo(){

    	return $this->hasMany(Photo::class);
    }