<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category_Post extends Model
{
    protected $fillable = ['category_id', 'post_id'];
}
