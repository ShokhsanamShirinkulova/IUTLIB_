<?php

namespace IUTLib;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function book()
    {
    	return $this->belongsTo('App\Book');
    }
}
