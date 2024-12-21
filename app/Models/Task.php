<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
   
    protected $fillable = [ 'title', 'description', 'long_description','completed'];
}
