<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'summary',
        'slug',
        'img_post',
        'post_view',
        'creator_id',
        'status'
    ];

    protected $primaryKey = 'post_id';
    protected $table = 'post';
}
