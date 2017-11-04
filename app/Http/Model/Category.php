<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "blog_category";
    protected $primaryKey = "category_id";
    public $timestamps = false;
}
