<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'news';

    protected $softDelete = false; 

    protected $fillable = [
        'id',
        
        'title',
        'text',
        'photo_link',

        'created_at',
        'updated_at',

        'deleeted_at'
    ];
}
