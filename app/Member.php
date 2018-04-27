<?php

namespace IUTLib;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
   	// Table Name
    protected $table = 'users';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
