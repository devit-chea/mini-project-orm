<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'title', 'description', 'published_at', 'category_id', 'content'
    ];

    public function categories()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
    public function articlePhoto()
    {
        return $this->hasMany('App\Models\ArticlePhoto', 'article_id');
    }
}
