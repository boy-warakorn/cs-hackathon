<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Posts extends Model
{
    protected $fillable=['schoolname','description','phonenumber','check','difficult','success'];
}
