<?php

namespace IUTLib;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
   	// Table Name
    protected $table = 'books';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function genres()
    {
    	return $this->hasMany('App\Genre');
    }
    
    public function comments($value='')
    {
        return $this->hasMany('IUTLib\Comment');
    }

    public function book()
    {
        return $this->belongsTo('App\Book');
    }
}
