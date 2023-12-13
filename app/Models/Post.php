<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'pid';
    protected $fillable = ['title_posts', 'slug', 'lide', 'description', 'image', 'status', 'is_recente'];
}
