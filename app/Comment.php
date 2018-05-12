<?php

namespace IUTLib;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'book_id', 'body'];
    // Table Name
    protected $table = 'comments';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function user()
    {
    	return $this->belongsTo('IUTLib\User');
    }

    public function book()
    {
        return $this->belongsTo('IUTLib\Book');
    }
}
