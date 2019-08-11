<?php

namespace ARTICLES;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    public function user(){
        return $this->hasOne('\ARTICLES\User', 'id', 'user_id');
    }

    public function comments(){
        return $this->hasMany('\ARTICLES\Comment', 'article_id', 'id');
    }
}
