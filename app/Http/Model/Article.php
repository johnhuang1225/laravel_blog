<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'blog_article';
    protected $primaryKey = 'art_id';
    protected $guarded = [];
    public $timestamps = false;
}
