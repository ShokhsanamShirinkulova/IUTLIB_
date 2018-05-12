<?php

namespace IUTLib;

use Illuminate\Database\Eloquent\Model;

class Relation_genres_books extends Model
{
    protected $table = 'relation_between_genres_books';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

}
