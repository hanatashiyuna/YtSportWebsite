<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Views extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'viewable_type',
        'viewable_id',
        'visitor',
        'collection',
        'viewed_at'
    ];

    protected $primaryKey = 'id';
    protected $table = 'views';
}
