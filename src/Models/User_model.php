<?php

namespace avivieu\bitrixRedmine\Models;

use Illuminate\Database\Eloquent\Model;

class User_model extends Model
{
    protected $table = 'redmine_users';
    public $timestamps = false;
}