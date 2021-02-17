<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user_table';
    public $timestamps = false;
    protected $primaryKey = 'userId';
}
