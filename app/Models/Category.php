<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'summary',
        'slug',
        'img_post',
        'post_view',
        'creator_id',
        'status'
    ];

    protected $primaryKey = 'category_id';
    protected $table = 'category';
}
