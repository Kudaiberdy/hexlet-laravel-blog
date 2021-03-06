<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'body', 'state', 'category_id'];

    public function category()
    {
        return $this->belongsTo(__NAMESPACE__ . '\ArticleCategory');
    }

    public function isPublished()
    {
        return $this->state == 'published';
    }
}
